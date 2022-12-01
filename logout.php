<?php
session_start();
if(isset($_SESSION['user_id'])){
    unset($_SESSION['user_id']);
}
echo "You have logged out successfully.";
header("Location: login.php");
die;
?>