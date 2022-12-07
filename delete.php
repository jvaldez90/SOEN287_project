<?php
session_start();
$_SESSION;
include ("./connection.php");
include("./functions.php");

if(isset($_GET['delete_id'])){        
    $id = $_GET['delete_id'];

    $sql = "DELETE FROM grade_records WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: indexLogin.php");
        echo "Student record has been deleted successfully";
    }else {
        die;
    }
}
?>