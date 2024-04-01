<?php
$insert = false;
if (isset($_POST['Submit'])) {
    //connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    //db connection
    $con = mysqli_connect($server, $username, $password, "trip");
    //check connection
    if (!$con) {
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "success connnecting to the db";
    //post variables
    $name = $gender = $age = $email = $phone = $desc = "";
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];


    $sql = "INSERT INTO `trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;
//query execution
    if ($con->query($sql) == true) { //-> object operator
        // echo "Successfully inserted";
        $insert = true;
    } else {
        echo "Error: $sql <br> $con->error";
    }
    //close the connection
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Welcome to the trip form</h1>
        <h1>Enter your details</h1>
        <?php
        if ($insert == true) {
            echo "<p class='submitMsg'>Thanks for submitting your form</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="enter your name">
            <input type="text" name="age" id="age" placeholder="enter your age">
            <input type="text" name="gender" id="gender" placeholder="enter your gender">
            <input type="email" name="email" id="email" placeholder="enter our email">
            <input type="phone" name="phone" id="phone" placeholder="enter our phone number">
            <textarea name="desc" id="desc" cols="30" rows="10"
                placeholder="enter any other information here"></textarea>
            <button class="btn" name="Submit">Submit</button>
        </form>
    </div>
</body>

</html>