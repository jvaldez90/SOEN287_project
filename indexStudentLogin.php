<?php
    session_start();
    $_SESSION;

    include("./connection.php");
    include("./functions.php");

    $user_data = check_login($conn);


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Concordia University SOEN 287</title>
        <link rel="stylesheet" href="./indexLogin.css">
        <meta charset="UTF-8">
    </head>
    <body>

            <h2 id="courseTitle"><br/>
                Concordia University <br/>
                SOEN 287 Grades Management System<br/>
                Fall 2022 <br/>
            </h2>
            <hr>
            <div class="nav" style="font-family:Verdana, Geneva, Tahoma, sans-serif; font-size: 15px; margin: 10px;">
                <p>Logged in as: <?php echo $user_data['name'];?></p>
            </div>
            <div id="addButtons">
                <button onclick="location.href='./indexStats.php';" value="indexStats">View Statistics</button>
                <button onclick="location.href='./logout.php';" value="logout">Sign Out</button>
            </div>
            <br/>
            <table class="assessment" id="table">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Assignment 1</th>
                        <th>Assignment 2</th>
                        <th>Assignment 3</th>
                        <th>Midterm Test</th>
                        <th>Final Exam</th>
                        <th>Average</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Generate data of list of students from grade_records table -->
                    <?php
                        $query = "SELECT * FROM grade_records";
                        $result = mysqli_query($conn, $query);
                        if($result && mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                // Calculate Average for each row in table
                                $average = ($row['assignment_1'] + $row['assignment_2'] + $row['assignment_3']+ $row['midterm']+$row['final_exam'])/5;
                            echo "<tr>" .
                                "<td>". $row['name']."</td>".
                                "<td>". $row['assignment_1']."</td>".
                                "<td>". $row['assignment_2']."</td>".
                                "<td>". $row['assignment_3']."</td>".
                                "<td>". $row['midterm']."</td>".
                                "<td>". $row['final_exam']."</td>".
                                "<td>". number_format($average, 2)."%</td>".
                                "<td>". $row['final_grade']."</td>".
                                "</tr>";
                            }
                        }
                    ?>
                    <tr>
                        <td><pre></pre></td>
                        <td></td><!--A1-->
                        <td></td><!--A2-->
                        <td></td><!--A3-->
                        <td></td><!--Midterm-->
                        <td></td><!--Final-->
                        <td></td><!--Average-->
                        <td></td>
                    </tr>
                </tbody>
                <tfoot id="tableFoot">
                    <tr>
                        <th></th>
                        <th>Avg A1</th>
                        <th>Avg A2</th>
                        <th>Avg A3</th>
                        <th>Avg Midtrem</th>
                        <th>Avg Final</th>
                        <th>Median</th>
                        <th></th>
                    </tr>
                    <tr>
                        <!-- Generate the Average for each colomun in table -->
                        <?php
                        $avg_a1 = "SELECT AVG(assignment_1) FROM grade_records";
                        $avg_a2 = "SELECT AVG(assignment_2) FROM grade_records";
                        $avg_a3 = "SELECT AVG(assignment_3) FROM grade_records";
                        $avg_midterm = "SELECT AVG(midterm) FROM grade_records";
                        $avg_final = "SELECT AVG(final_exam) FROM grade_records";


                        $query_a1 = mysqli_query($conn, $avg_a1);
                        $query_a2 = mysqli_query($conn, $avg_a2);
                        $query_a3 = mysqli_query($conn, $avg_a3);
                        $query_midterm = mysqli_query($conn, $avg_midterm);
                        $query_final = mysqli_query($conn, $avg_final);

                        echo "<td><pre></pre></td>";
                        if($a1 = mysqli_fetch_assoc($query_a1)){
                            echo "<td>".number_format($a1['AVG(assignment_1)'], 2)."%</td>";
                        }
                        if($a2 = mysqli_fetch_assoc($query_a2)){
                            echo "<td>".number_format($a2['AVG(assignment_2)'], 2)."%</td>";
                        }
                        if($a3 = mysqli_fetch_assoc($query_a3)){
                            echo "<td>".number_format($a3['AVG(assignment_3)'], 2)."%</td>";
                        }
                        if($midterm = mysqli_fetch_assoc($query_midterm)){
                            echo "<td>".number_format($midterm['AVG(midterm)'], 2)."%</td>";
                        }
                        if($final = mysqli_fetch_assoc($query_final)){
                            echo "<td>".number_format($final['AVG(final_exam)'], 2)."%</td>";
                        }

                        echo "<td></td>";
                        echo "<td></td>";

                        ?>
                    </tr>
                    <tr>
                        <td><pre></pre></td>
                        <td id ="AvgA1"></td>
                        <td id ="AvgA2"></td>
                        <td id ="AvgA3"></td>
                        <td id ="AvgMidterm"></td>
                        <td id ="avgFinal"></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
                <script src="script.js"></script>
            </table>
    </body>
        <footer class="footer">
            <hr>
            <p><strong>SOEN 287: Web Programming - Fall 2022</strong></p>
    </footer>
</html>
