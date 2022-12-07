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
            <div><a href="./indexStudentLogin.php"><p>Student Page View</p></a></div>
            <div id="addButtons">
                <button onclick="location.href='./newRecord.php';" value="newRecord">Add New Student</button>
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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Barry</td>
                        
                        <td id="A1Barry">87</td><!--A1-->
                        <td id="A2Barry">25</td><!--A2-->
                        <td id="A3Barry">80</td><!--A3-->
                        <td id="MidTerm_Barry">75</td><!--Midterm-->
                        <td id="FinalExam_Barry">72</td><!--Final-->
                        <td id="avgBarry"></td><!--Average-->
                        <td id="letterGradeB"></td> <!--Final Grade-->
                        <td>
                            <button id="editButton" onclick="location.href='./editRecord.html';" value="editRecord">Edit</button>
                            <button id="deleteButton" value="delete">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Oliver</td>
                        <td id ="A1Oliver">88</td><!--A1-->
                        <td id ="A2Oliver">75</td><!--A2-->
                        <td id ="A3Oliver">79</td><!--A3-->
                        <td id="MidTerm_Oliver">75</td><!--Midterm-->
                        <td id="FinalExam_Oliver">75</td><!--Final-->
                        <td id="avgOliver"></td><!--Average-->
                        <td id ="letterGradeO"></td>
                        <td>
                            <button id="editButton" onclick="location.href='./editRecord.html';" value="editRecord">Edit</button>
                            <button id="deleteButton" value="delete">Delete</button> 
                        </td>
                    </tr>
                    <tr>
                        <td>Kara</td>
                        <td id ="A1Kara">91</td><!--A1-->
                        <td id ="A2Kara">90</td><!--A2-->
                        <td id ="A3Kara">95</td><!--A3-->
                        <td id ="MidTerm_Kara">90</td><!--Midterm-->
                        <td id ="FinalExam_Kara">85</td><!--Final-->
                        <td id ="avgKara"></td><!--Average-->
                        <td id ="letterGradeK"></td>
                        <td>
                            <button id="editButton" onclick="location.href='./editRecord.html';" value="editRecord">Edit</button>
                            <button id="deleteButton" value="delete">Delete</button>
                        </td>
                    </tr>
                    
                    <!-- Generate data of list of students from grade_records table -->
                    <?php                        
                        $query = "SELECT * FROM grade_records";
                        $result = mysqli_query($conn, $query);

                        if($result && mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                // Store each row data into a url query parameters
                                $id = $row['id'];
                                $name = $row['name'];
                                $a1 = $row['assignment_1'];
                                $a2 = $row['assignment_2'];
                                $a3 = $row['assignment_3'];
                                $midterm = $row['midterm'];
                                $final_exam = $row['final_exam'];
                                $average = $row['average'];
                                $url = "./editRecord.php?id=$id&name=$name&assignment_1=$a1&assignment_2=$a2&assignment_3=$a3&midterm=$midterm&final_exam=$final_exam";
                                
                                // Display grade_records table to user
                                echo "<tr>" .
                                "<td>". $name."</td>".
                                "<td>". $a1."</td>".
                                "<td>". $a2."</td>".
                                "<td>". $a3."</td>".
                                "<td>". $midterm."</td>".
                                "<td>". $final_exam."</td>".
                                "<td>". number_format($average, 2)."%</td>".
                                "<td>". $row['final_grade']."</td>".
                                "<td>
                                <button id=\"editButton\" onclick=\"location.href='$url'\" value=\"editRecord\">Edit</button>
                                <button id=\"deleteButton\" onclick=\"location.href='./delete.php?delete_id=$id'\" value=\"delete\">Delete</button></td>".
                                "</tr>";
                            }
                        }
                    ?>
                    <tr>
                        <td><pre></pre></td>
                        <td></td><!--A1-->
                        <td></td><!--A2-->
                        <td></td><!--A3-->
                        <td></td><!--midterm-->
                        <td></td><!--Final-->
                        <td></td><!--Average-->
                        <td></td>
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
        