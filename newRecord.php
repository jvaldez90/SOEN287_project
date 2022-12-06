<?php
session_start();
$_SESSION;
include("./connection.php");
include("./functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST['name'];
    $a1 = $_POST['assignment_1'];
    $a2 = $_POST['assignment_2'];
    $a3 = $_POST['assignment_3'];
    $midterm = $_POST['Midterm'];
    $final = $_POST['final_exam'];
    $average = $_POST['average'];
    $grade = $_POST['final_grade'];

    if(!empty($name) && !is_numeric($name)){
        $average = NULL;
        $grade = NULL;
        // If all assignment scores are not set by user, then set everything to 0
        if(empty($a1) && empty($a2) && empty($a3) && empty($midterm) && empty($final)){
            $a1 = 0;
            $a2 = 0;
            $a3 = 0;
            $midterm = 0;
            $final = 0;
        }
        // Save to database table grade_records
        $query = "INSERT INTO grade_records (name, assignment_1, assignment_2, assignment_3, midterm, final_exam, average, final_grade) VALUES ('$name', '$a1', '$a2', '$a3', '$midterm', '$final', '$average', '$grade')";

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
            <div id="header">New Student Record</div><br/>
            <form method="POST">
                <div id="name">Name:
                    <input id="name" name="name" type="text">
                </div><br/>
                <div id="a1">Assignment 1:
                    <input id="assignment_1" name="assignment_1" type="text">
                </div><br/>
                <div id="a2">Assignment 2:
                    <input id="assignment_2" name="assignment_2" type="text">
                </div><br/>
                <div id="a3">Assignment 3:
                    <input id="assignment_3" name="assignment_3" type="text">
                </div><br/>
                <div id="midterm">Midterm Test:
                    <input id="Midterm" name="Midterm" type="text">
                </div><br/>
                <div id="final">Final Exam:
                    <input id="final_exam" name="final_exam" type="text">
                </div><br/><br/>
                <div id="save">
                    <input id="saveButton" type="submit" value="SAVE"><br>
                </div>
            </form>
        </div>
    </main>
</body>
</html>