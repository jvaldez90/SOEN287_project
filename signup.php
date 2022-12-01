<?php
    session_start();
    include("./connection.php");
    include("./functions.php");
    include("./login.php");

    
    if($_SERVER['REQUEST_METHOD']== "POST"){
        // Something was posted
        $username = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $is_faculty = $_POST['is_faculty'];
        $is_student = $_POST['is_student'];


        if(!empty($username) && !empty($email) && !empty($password) && !is_numeric($email)){
            //Save to database
            $user_id = random_num(20);
            $query = "INSERT INTO users (user_id, name, email, password, is_faculty, is_student) VALUES ('$user_id', '$username', '$email', '$password', '$is_faculty', '$is_student')";

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
                            <input id="username" name="name" type="text" placeholder="Enter your name">
                            <input id="email" name="email" type="email" placeholder="Email">
                        </div>
                        <div id="passwordArea">
                            <input id="password" name="password" type="password" placeholder="Password">
                        </div>
                        <div id="faculty-student">
                            <p>
                                <strong>Select: Faculty member or Student</strong><br>
                                <input type="radio" id="is_faculty" name="is_faculty" value=1>
                                <label for="is_faculty">Faculty</label>
                                <input type="radio" id="is_student" name="is_student" value=1>
                                <label for="is_student">Student</label>
                            </p>
                        </div>
                        <div id="submissionArea">
                                <input id="submitButton" type="submit" value="SIGN UP"><br>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>