<?php
$insert = false;

$server = "localhost";
$username = "root";
$password = "";

// add task
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST['task'];

    $con = mysqli_connect($server, $username, $password, "todo");
    if (!$con) {
        die("connection to this database failed due to " . mysqli_connect_error());
    }

    $sql = "INSERT INTO `tasks` (`task`, `completed`, `created_at`) VALUES ('$task', 0, current_timestamp());";
    if ($con->query($sql) == true) {
        $insert = true;
    } else {
        echo "Error: $sql <br> $con->error";
    }
    $con->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>The To Do List</h1>
        <div class="creator">
            <h2>Create a new Task</h2>
            <form action="index.php" method="post">
                <input type="text" name="task" placeholder="Enter new task">
                <button class="btn" name="Submit">Add Task</button>
            </form>
        </div>
        <div class="viewer">
            <h2>Tasks</h2>
            <div class="tasks">
                <ul id="task-list">
                    <?php include 'get_tasks.php'; ?>
                </ul>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>