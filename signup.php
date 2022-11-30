<?php
    session_start();
    include("./connection.php");
    include("./functions.php");
    
    if($_SERVER['REQUEST_METHOD']== "POST"){
        // Something was posted
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $is_faculty = $_POST['is_faculty'];
        $is_student = $_POST['is_student'];


        if(!empty($username) && !empty($email) && !empty($password) && !is_numeric($email)){
            //Save to database
            $user_id = random_num(20);
            $query = "INSERT INTO users (user_id, username, email, password, is_faculty, is_student) VALUES ('$user_id', '$username', '$email', '$password', '$is_faculty', '$is_student')";

            mysqli_query($conn, $query);
            header("Location: login.php");
            die;
        }else{
        echo "Please enter some valid information!";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Grades System Sign Up</title>
        <link rel="stylesheet" href="./login.css">

    </head>
    <body>
        <main class="container">
            <div id="loginArea">
                <div id="header">
                    Concordia University<br/>
                    Grades Management System<br/><br/>
                </div>
                <div name="loginForm" id="loginForm">
                    <form  method="POST">
                        <div id="loginMessage">Sign Up</div>
                        <div id="userNameArea">
                            <input id="username" name="username" type="text" placeholder="Enter your name">
                            <input id="email" name="email" type="email" placeholder="Email">
                        </div>
                        <div id="passwordArea">
                            <input id="password" name="password" type="password" placeholder="Password">
                        </div>
                        <div id="faculty-student">
                            <p><strong>Select: Faculty member or Student</strong></p>
                            <input type="radio" id="faculty" name="faculty" value="faculty">
                            <label for="faculty">Faculty</label>
                            <input type="radio" id="student" name="student" value="student">
                            <label for="student">Student</label>
                        </div>
                        <div id="submissionArea">
                            <a href="login.php">
                                <input id="submitButton" type="submit" value="SIGN UP">
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>