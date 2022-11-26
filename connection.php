<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "SOEN287";

if($conn = mysqli_connect($server, $username, $password, $dbname)){
    die("failed to connect");
}

?>