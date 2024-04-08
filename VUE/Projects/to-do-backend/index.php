<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include 'config.php';

// Add task
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $task = $_POST['task'];
  echo $task;
  $sql = "INSERT INTO tasks (task, completed, created_at) VALUES ('$task', 0, NOW())";

  if ($conn->query($sql) === TRUE) {
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

  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
}

// Toggle task completion
if ($_SERVER["REQUEST_METHOD"] == "PUT") {
  parse_str(file_get_contents("php://input"), $_PUT);
  $id = $_PUT['id'];
  $completed = $_PUT['completed'];

  $sql = "UPDATE tasks SET completed=$completed WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
}

$conn->close();
?>
