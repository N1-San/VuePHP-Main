<?php
$server = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($server, $username, $password, "todo");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tasks ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $taskId = $row['id'];
        $task = $row['task'];
        $completed = $row['completed'];
        $class = $row['completed'] ? 'completed' : ''; //checkbox status checker
        echo "<li class='$class'><input type='checkbox' class='task-checkbox' data-task-id='$taskId' " . ($completed ? 'checked' : '') . ">" . $task . "<button class='del-btn' data-task-id='$taskId'>Delete</button></li>";
    }
} else {
    echo "<li>No tasks found</li>";
}

$conn->close();
?>
