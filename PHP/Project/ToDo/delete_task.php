<?php
$server = "localhost";
$username = "root";
$password = "";
if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $taskId = $_GET['id'];

    $conn = new mysqli($server, $username, $password, "todo");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM tasks WHERE id='$taskId'";
    if ($conn->query($sql) === TRUE) {
        // Success, do nothing
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
