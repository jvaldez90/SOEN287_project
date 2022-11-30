<?php
session_start();
include("./connection.php");
include("./functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST['name'];
    $a1 = $_POST['a1'];
    $a2 = $_POST['a2'];
    $a3 = $_POST['a3'];
    $midterm = $_POST['midterm'];
    $final = $_POST['final'];

    if(!empty($name)){
        // Save to database table 'grade_records'
        $query = "INSERT INTO grade_records (name, a1, a2, a3, midterm, final) VALUES('$name', '$a1', '$a2', '$a3', '$midterm', '$final')";

        mysqli_query($conn, $query);
        echo "New Record has been saved";
        header("Location: indexLogin.php");
        die;

    }else {
        echo "Please enter at least the name of new student!";
    }
}

?>