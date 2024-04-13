<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

include 'config.php';

// Add task
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $_POST = json_decode(file_get_contents("php://input"),true);
  $task = $_POST['task'];
  $sql = "INSERT INTO `tasks` (`task`, `completed`, `created_at`) VALUES ('$task', 0, current_timestamp())";
  
  if ($conn->query($sql) == true) {
    echo "New record created successfully";
    
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Get tasks
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $sql = "SELECT * FROM tasks";
  $result = $conn->query($sql);
  $tasks = [];

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $tasks[] = $row;
    }
    echo json_encode($tasks);
  } else {
    echo "0 results";
  }
}

// Delete task
if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
  $id = $_GET['id'];

  $sql = "DELETE FROM tasks WHERE id=$id";

  if ($conn->query($sql) === True) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
}

// Toggle task completion
if ($_SERVER["REQUEST_METHOD"] == "PUT") {
  // parse_str(file_get_contents("php://input"), $_PUT);
  $id = $_PUT['id'];
  $completed = $_PUT['completed'];

  $sql = "UPDATE tasks SET completed=$completed WHERE id=$id";

  if ($conn->query($sql) === True) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
}

$conn->close();
?>
