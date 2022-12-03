<?php
session_start();
$_SESSION;
include("./connection.php");
include("./functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST['Name'];
    $a1 = $_POST['Assignment 1'];
    $a2 = $_POST['Assignment 2'];
    $a3 = $_POST['Assignment 3'];
    $midterm = $_POST['Midterm'];
    $final = $_POST['Final Exam'];

    if(!empty($name)){
        // Save to database table 'grade_records'
        $query = "INSERT INTO grade_records (name, a1, a2, a3, midterm, final) VALUES ('$name', '$a1', '$a2', '$a3', '$midterm', '$final')";
        mysqli_query($conn, $query);
        
        echo "New Record has been saved";
        header("Location: indexLogin.php");
        die;

    }else {
        echo "Please enter at least the name of new student!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta httdiv-equiv="X-UA-Comdivatible" content="IE=edge">
    <meta name="viewdivort" content="width=device-width, initial-scale=1.0">
    <title>New Student Record</title>
    <link rel="stylesheet" href="./newRecord.css">
</head>
<body>
    <main class="container">
        <div name="newRecordForm" id="newRecordForm">
            <form method="POST">
                <div id="header">New Student Record</div><br/>
                <div id="name">Name:
                    <input id="name" name="name" type="text">
                </div><br/>
                <div id="a1">Assignmet 1:
                    <input id="a1" name="a1" type="text">
                </div><br/>
                <div id="a2">Assignment 2:
                    <input id="a2" name="a2" type="text">
                </div><br/>
                <div id="a3">Assignment 3:
                    <input id="a3" name="a3" type="text">
                </div><br/>
                <div id="midterm">Midterm Test:
                    <input id="midterm" name="midterm" type="text">
                </div><br/>
                <div id="final">Final Exam:
                    <input id="final" name="final" type="text">
                </div><br/><br/>
                <div id="save">
                    <input id="saveButton" type="submit" value="Save Record"><br>
                </div>
            </form>
        </div>
    </main>
</body>
</html>