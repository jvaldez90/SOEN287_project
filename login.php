<?php
    session_start();
    include("./connection.php");
    include("./functions.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // Something was posted
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!empty($email) && !empty($password) && !is_numeric($email)) {
            //Read to database
            $query = "SELECT * FROM users WHERE email ='$email' LIMIT 1";

            $result = mysqli_query($conn, $query);

            if($result){

                if($result && mysqli_num_rows($result) > 0){
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['password'] === $password){
                        $_SESSION['user_id'] = $user_data['user_id'];
                        
                        // If user logging in is a teacher
                        if($user_data['is_faculty'] == 1){
                            // Redirect to faculty login page
                            header("Location: indexLogin.php");
                            die;
                        
                        // If user logging in is a student
                        }else if ($user_data['is_student'] == 1){
                            // Redirect to student login page 
                            header("Location: indexStudentLogin.php");
                            die;
                        }
                    }
                }
            }
        echo "Wrong email or password entered!";
        } else {
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
    <title>Grade System Login</title>
    <link rel="stylesheet" href="./login.css">
</head>
<body>
    <main class="container">
        <div id="loginArea">
            <div id="header">
                Concordia University<br/>
                Grades Management System<br/><br/>
            </div>
            <form name="loginForm" id="loginForm" method="POST">
                <div id="loginMessage">Sign In</div>
                <div id="userNameArea">
                    <input id="email" name="email" type="email" placeholder="Email">
                </div>
                <div id="passwordArea">
                    <input id="password" name="password" type="password" placeholder="Password">
                </div>
                <div id="submissionArea">
                    <input id="submitButton" type="submit" value="LOGIN"><br>
                </div>
                <div id="authOption">
                    <a href="" id="resetPassword">
                        <p>Forgot Password?</p>
                    </a>
                    <p>
                        Click to Create 
                        <a href="./signup.php" id="newAccount">New Account</a>
                    </p>
                </div>
            </form>
        </div>
    </main>
</body>
</html>