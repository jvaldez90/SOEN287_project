<?php
    session_start();
    include("./connetion.php");
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