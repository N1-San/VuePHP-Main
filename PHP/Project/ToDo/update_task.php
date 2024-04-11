<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$server = "localhost";
$username = "root";
$password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $taskId = $_GET['id'];
    $completed = $_GET['completed'];

    $conn = new mysqli($server, $username, $password, "todo");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //sql update operation command
    $sql = "UPDATE tasks SET completed='$completed' WHERE id='$taskId'";
    if ($conn->query($sql) === TRUE) {
        // Success, do nothing
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
