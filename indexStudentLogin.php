<?php
    session_start();
    $_SESSION;

    include("./connection.php");
    include("./functions.php");
    include("./indexStats.php");
    include("./logout.php");

    $user_data = check_login($conn);


?>