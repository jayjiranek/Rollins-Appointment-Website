<!--PHP script to start the users session to keep them logged in-->
<!--must include database connection-->
<?php
    session_start();
    include 'includes/dbh.inc.php';
?>

<!DOCTYPE html>

<html>
    
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="homestyle.css">
        <title>Your profile</title>
        <!--Styling for table-->
        <style type="text/css">

            table {
                border-collapse: collapse;
                width: 60%;
                color: black;
                font-family:;
                font-size: 15px;
                text-align: center;
                border: 2px solid blue;
                table-layout: center;
            
            }
            th {
                background-color: #f2f2f2;
                color: blue;
            }
            tr:nth-child(even){
                background-color: #f2f2f2;
            }

            th, td {
                padding: 10px;
            }

        </style>
    </head>
    <body>
        
        <!--Creates navigation bar at the top of the screen-->
        <ul class="navigation">
            <li><a href="#">Home</a></li>
            <li><a href="/login/calendar/calendarindex.html">Campus Calendar</a></li>
            <li><a href="/login/scheduleappts/scheduleindex.php">Schedule an Appoinment</a></li>
            <li><a href="/login/edityourprofile/editprofile.php">Your Class Schedule</a></li>
            <li><a href="/login/departmentinfo/infoindex.html">Department Information</a></li>
        </ul>

        <p class="logo">
            <img src="img/rollinsseal.jpeg.png" alt="logo" height="200px" width="200px">
        </p>

        <h1>Your Rollins Agenda</h1>

        <!--PHP script to display users information regarding appointments user just submitted-->
        <!--SQL statement to select the attributes, then 'if' statement to check if the value is in the database, then 'while' loop to output all values that are seleected-->
        <!--Interconnected PHP script with HTML elements-->
        <!--Display results into a table on the users homepage-->

        <h4>Upcoming Appointments with the Wellness Center</h4>

                <?php
                    $sql = "SELECT reason, counselor, day FROM wellnessform, users WHERE users.rnumber=wellnessform.rnumber;";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) { ?>

                    <table>    
                        <tr>
                            <th>Date & Time</th>
                            <th>Reason</th>
                            <th>Your Counselor</th>
                        </tr>
                <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>" . $row["day"] . "</td><td>" . $row['reason'] . "</td><td>" . $row["counselor"] . "</td></tr>";
                        }
                        echo "</table>";
                    }
                    else { 
                        echo "You have no upcoming appointments!";
                    }
                ?>
                <hr>

            </table>

        <!--PHP script to display users information regarding appointments user just submitted-->
        <!--SQL statement to select the attributes, then 'if' statement to check if the value is in the database, then 'while' loop to output all values that are seleected-->
        <!--Interconnected PHP script with HTML elements-->
        <!--Display results into a table on the users homepage-->

        <h4>Upcoming Appointments with Career Services & Life Planning</h4>

                <?php
            
                    $sql = "SELECT reason, day_time FROM career, users WHERE users.rnumber=career.rnumber;";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) { ?>

                    <table>
                        <tr>
                            <th>Date & Time</th>
                            <th>Reason</th>
                        </tr>
                <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>" . $row["day_time"] . "</td><td>" . $row['reason'] . "</td></tr>";
                        }
                        echo "</table>";
                    }
                    else {
                        echo "You have no upcoming appointments!";
                    }
                ?>
                <hr>

            </table>

        <!--PHP script to display users information regarding appointments user just submitted-->
        <!--SQL statement to select the attributes, then 'if' statement to check if the value is in the database, then 'while' loop to output all values that are seleected-->
        <!--Interconnected PHP script with HTML elements-->
        <!--Display results into a table on the users homepage-->

        <h4>Upcoming Appointments with Residential Life & Planning</h4>

                <?php
                    $sql = "SELECT reason, appt_date FROM reslife, users WHERE users.rnumber=reslife.rnumber;";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) { ?>

                    <table>
                        <tr>
                            <th>Date & Time</th>
                            <th>Reason</th>
                        </tr>

                <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>" . $row["appt_date"] . "</td><td>" . $row['reason'] . "</td></tr>";
                        }
                        echo "</table>";
                    }
                    else {
                        echo "You have no upcoming appointments!";
                    }
                ?>
                <hr>
                </table>

        <!--PHP script to display users information regarding appointments user just submitted-->
        <!--SQL statement to select the attributes, then 'if' statement to check if the value is in the database, then 'while' loop to output all values that are seleected-->
        <!--Interconnected PHP script with HTML elements-->
        <!--Display results into a table on the users homepage-->

        <h4>Upcoming Appointments with Religious & Spiritual Life</h4>

                <?php
                    $sql = "SELECT reason, appt_date FROM religious, users WHERE users.rnumber=religious.rnumber;";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) { ?>

                    <table>
                        <tr>
                            <th>Date & Time</th>
                            <th>Reason</th>
                        </tr>
                <?php

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>" . $row["appt_date"] . "</td><td>" . $row['reason'] . "</td></tr>";
                        }
                        echo "</table>";
                    }
                    else {
                        echo "You have no upcoming appointments!";
                    }
                ?>
                <hr>

                </table>

        <!--PHP script to display users information regarding appointments user just submitted-->
        <!--SQL statement to select the attributes, then 'if' statement to check if the value is in the database, then 'while' loop to output all values that are seleected-->
        <!--Interconnected PHP script with HTML elements-->
        <!--Display results into a table on the users homepage-->

        <h4>Upcoming Appointments with Fraterntiy & Sorority Life</h4>

                <?php
                    $sql = "SELECT reason, appt_date FROM fsl, users WHERE users.rnumber=fsl.rnumber;";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) { ?>

                    <table>
                        <tr>
                            <th>Date & Time</th>
                            <th>Reason</th>
                        </tr>
                    <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>" . $row["appt_date"] . "</td><td>" . $row['reason'] . "</td></tr>";
                        }
                        echo "</table>";
                    }
                    else { 
                        echo "You have no upcoming appointments!";
                    }
                ?>
                <hr>

                </table>

        <!--PHP script to display users information regarding appointments user just submitted-->
        <!--SQL statement to select the attributes, then 'if' statement to check if the value is in the database, then 'while' loop to output all values that are seleected-->
        <!--Interconnected PHP script with HTML elements-->
        <!--Display results into a table on the users homepage-->

        <h4>Upcoming Appointments with The Office of Title IX</h4>

                <?php
                    $sql = "SELECT reason, appt_date FROM titlenine, users WHERE users.rnumber=titlenine.rnumber;";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) { ?>

                    <table>
                        <tr>
                            <th>Date & Time</th>
                            <th>Reason</th>
                        </tr>
                <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>" . $row["appt_date"] . "</td><td>" . $row['reason'] . "</td></tr>";
                        }
                        echo "</table>";
                    }
                    else {
                        echo "You have no upcoming appointments!";
                    }
                ?>
                <hr>

                </table>

        <!--PHP script to display users information regarding appointments user just submitted-->
        <!--SQL statement to select the attributes, then 'if' statement to check if the value is in the database, then 'while' loop to output all values that are seleected-->
        <!--Interconnected PHP script with HTML elements-->
        <!--Display results into a table on the users homepage-->

        <h4>Upcoming Appointments with International Studies</h4>

                <?php
                    $sql = "SELECT reason, appt_date FROM international, users WHERE users.rnumber=international.rnumber;";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) { ?>

                    <table>
                        <tr>
                            <th>Date & Time</th>
                            <th>Reason</th>
                        </tr>
                <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>" . $row["appt_date"] . "</td><td>" . $row['reason'] . "</td></tr>";
                        }
                        echo "</table>";
                    }
                    else {
                        echo "You have no upcoming appointments!";
                    }
                ?>
                <hr>

                </table>

        <!--PHP script to display users information regarding appointments user just submitted-->
        <!--SQL statement to select the attributes, then 'if' statement to check if the value is in the database, then 'while' loop to output all values that are seleected-->
        <!--Interconnected PHP script with HTML elements-->
        <!--Display results into a table on the users homepage-->

        <h4>Upcoming Appointments with Academic Department Heads</h4>

                <?php
                    $sql = "SELECT reason, major, appt_date FROM departments, users WHERE users.rnumber=departments.rnumber;";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) { ?>

                    <table>
                        <tr>
                            <th>Date & Time</th>
                            <th>Department</th>
                            <th>Reason</th>
                        </tr>
                <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>" . $row["appt_date"] . "</td><td>" . $row["major"] . "</td><td>" . $row['reason'] . "</td></tr>";
                        }
                        echo "</table>";
                    }
                    else {
                        echo "You have no upcoming appointments!";
                    }
                ?>
                <hr>

                </table>

    </body>
</html>