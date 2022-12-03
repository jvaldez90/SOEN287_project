<?php
    session_start();
    include("./connetion.php");
    include("./functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_POST['Name'];
        $a1 = $_POST['Assignment 1'];
        $a2 = $_POST['Assignment 2'];
        $a3 = $_POST['Assignment 3'];
        $midterm = $_POST['Midterm'];
        $final = $_POST['Final'];
    
        if(!empty($name)){
            // Save to database table 'grade_records'
            $query = "SELECT * FROM grade_records WHERE name='$name LIMIE 1";

            $result = mysqli_query($conn, $query);

            // if($result){
            //     if($result && mysqli_num_rows($result) > 0){
            //         $a1 = $_POST['a1'];
            //         $a2 = $_POST['a2'];
            //         $a3 = $_POST['a3'];
            //         $midterm = $_POST['midterm'];
            //         $final = $_POST['final'];
            //     }
            // }
    
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
    <title>Edit Student Record</title>
    <link rel="stylesheet" href="./newRecord.css">
</head>
<body>
    <main class="container">
        <form name="editRecordForm" id="editRecordForm" method="post" action="./editRecord.php">
            <div id="header">Edit Student Record</div><br/>
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
                <button id="saveButton" role="button">Save</button>
            </div>
        </form>
    </main>
</body>
</html>