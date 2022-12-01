<?php
    session_start();
    $_SESSION;

    include("./connection.php");
    include("./functions.php");
    include("./editRecord.php");
    include("./indexStats.php");
    include("./indexStudentLogin.php");
    include("./newRecord.php");
    include("./logout.php");
    include("./indexLogin.html");

    $user_data = check_login($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concordia University SOEN 287<</title>
    <link rel="stylesheet" href="./indexLogin.css">
</head>
<body>
    <h2 id="courseTitle"><br/>
        Concordia University <br/>
        SOEN 287 Grades Management System<br/>
        Fall 2022 <br/>
    </h2>
    <hr>
    <div>
        <p>You are logged in as: <?= $user_data['names'];?></p><br>
        <a href="./indexStudentLogin.html"><p>Student Page View</p></a></div>
    <div id="addButtons">
        <button onclick="location.href='./newRecord.php';" value="newRecord">Add New Student</button>
        <button onclick="location.href='./indexStats.php';" value="indexStats">View Statistics</button>
        <button onclick="location.href='./logout.php';" value="logout">Sign Out</button>
    </div>
    <br/>
    <h1> This is the index page </h1>
    <br>
    Hello, <?php  echo $user_data['user_name'];?>

</body>
<footer class="footer">
    <hr>
    <p><strong>SOEN 287: Web Programming - Fall 2022</strong></p>
</footer>
</html>