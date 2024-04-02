<?php
$insert = false;
if (isset($_POST['Submit'])) {
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password, "todo");

    if (!$con) {
        die("connection to this database failed due to " . mysqli_connect_error());
    }
    $task = $_POST['task'];

    $sql = "INSERT INTO `tasks` (`task`, `completed`, `created_at`) VALUES ('$task', 0, current_timestamp());";
}
if ($con->query($sql) == true) {
    $insert = true;
} else {
    echo "Error: $sql <br> $con->error";
}

//view
$retrieve = "SELECT * FROM tasks";
$result = $con->query($retrieve);

//update
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["task_id"])) {
    $taskId = $_POST["task_id"];
    $completed = isset($_POST["complete"]) ? 1 : 0; // Check if checkbox is checked

    if ($completed == 1) {
        $update = "UPDATE tasks SET completed";
    }
    
}

//deletion

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["task_id"])) {
    $taskId = $_POST["task_id"];
    
    $delete = "DELETE FROM tasks WHERE id = <task_id>;";
    
}

$con->close();
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
            <ul name="view">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li>". $row["task"] ."</li>" . "<input type='hidden' name='task_id' value='" . $row['id'] . "'>" . "<input type='checkbox' class='complete-checkbox' data-task-id='" . $row['id'] . "' name='complete'>" . "<button class='del-btn' data-task-id='" . $row['id'] . "' name='delete'>Delete</button>";
                    }
                }else{
                    echo "No task found";
                }
                ?>
            </ul>
        </div>
        </div>
        
    </div>
    <script src="script.js"></script>
</body>

</html>