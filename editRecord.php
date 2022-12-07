<?php
    session_start();
    $_SESSION;
    include("./connection.php");
    include("./functions.php");
    
    $id = $_GET['id'];
    $query = "SELECT * FROM grade_records WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $a1 = $row['assignment_1'];
    $a2 = $row['assignment_2'];
    $a3 = $row['assignment_3'];
    $midterm = $row['midterm'];
    $final_exam = $row['final_exam'];
    $average = $row['average'];
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['update'])) {
            $name = $_POST['name'];
            $a1 = $_POST['assignment_1'];
            $a2 = $_POST['assignment_2'];
            $a3 = $_POST['assignment_3'];
            $midterm = $_POST['midterm'];
            $final_exam = $_POST['final_exam'];
            $average = $_POST['average'];
            $grade = $_POST['final_grade'];
            
            // Calculate the Average of a single student to be INSERTed into database
            $average = ($row['assignment_1'] + $row['assignment_2'] + $row['assignment_3']+ $row['midterm']+$row['final_exam'])/5;
            
            // Update Student Scores into the database
            $update = "UPDATE grade_records SET name='$name', assignment_1='$a1', assignment_2='$a2', assignment_3='$a3', midterm='$midterm', final_exam='$final_exam', average='$average' WHERE id='$id'";
            $result = mysqli_query($conn, $update);
            if ($result) {
                header("Location: indexLogin.php");
                echo "Record has been updated successfully";
                die;
            }
            } else {
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
    <link rel="stylesheet" href="./editRecord.css">
</head>
<body>
    <main class="container">
        <div name="editRecordForm" id="editRecordForm">
            <div id="header">Edit Student Record</div><br/>
            <form method="POST">
                <div id="name">Name:
                    <input id="name" name="name" type="text" value="<?= $_GET['name'];?>">
                </div><br/>
                <div id="a1">Assignment 1:
                    <input id="assignment_1" name="assignment_1" type="text" value="<?=$_GET['assignment_1'];?>">
                </div><br/>
                <div id="a2">Assignment 2:
                    <input id="assignment_2" name="assignment_2" type="text" value="<?=$_GET['assignment_2'];?>">
                </div><br/>
                <div id="a3">Assignment 3:
                    <input id="assignment_3" name="assignment_3" type="text" value="<?=$_GET['assignment_3'];?>">
                </div><br/>
                <div id="midterm">Midterm Test:
                    <input id="midterm" name="midterm" type="text" value="<?=$_GET['midterm'];?>">
                </div><br/>
                <div id="final">Final Exam:
                    <input id="final_exam" name="final_exam" type="text" value="<?=$_GET['final_exam'];?>">
                </div><br/><br/>
                <div id="update">
                    <input id="updateButton" name="update" type="submit"value="UPDATE"><br>
                </div> 
            </form>           
        </div>
    </main>
</body>
</html>