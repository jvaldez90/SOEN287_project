<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Student Record</title>
    </head>
    <body>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "SOEN287";

            $conn = mysqli_connect($servername, $username, $password, $dbname);

            if(!$conn){
                die("Connection failed: " . mysqli_connect_error());
            }
            echo "Connected successfully";

            mysqli_close($conn);

        ?>
        <div id="header">Edit Student Record</div><br/>
            <?php echo $_POST["name"];?><br/>
            <?php echo $_POST["a1"];?><br/>
            <?php echo $_POST["a2"];?><br/>
            <?php echo $_POST["a3"];?><br/>
            <?php echo $_POST["midterm"];?><br/>
            <?php echo $_POST["final"];?>
    </body>
</html>