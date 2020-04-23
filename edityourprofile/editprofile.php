<!--Include the database connection-->
<?php
    include '../includes/dbh.inc.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="editprofilestyle.css">
        <title>Edit Your Profile</title>
    </head>

    <!--Creates navigation bar at top of screen-->
    <body>
        <ul>
            <li><a href="/login/homeindex.php">Home</a></li>
            <li><a href="/login/calendar/calendarindex.html">Campus Calendar</a></li>
            <li><a href="/login/scheduleappts/scheduleindex.php">Schedule an Appoinment</a></li>
            <li><a href="#">Your Class Schedule</a></li>
            <li><a href="/login/departmentinfo/infoindex.html">Department Information</a></li>
        </ul>

        <h1>Your Profile</h1>

        <h2>Your Class Schedule</h2>

        <!--PHP script to select the course that the user enters and output onto the students class schedule in a table-->
        <!--SQL statement to select the data, then 'if' statement to check if the value is in the database, then 'while' loop to output all values that are seleected-->
        <!--If there is no information in database, output that user has no courses added.-->
        <?php
            $sql = "SELECT courseNum, courseMajor, courseLevel, courseName, numCredits, dayTime, location, professor FROM course_log, courses WHERE course_log.course_num=courses.courseNum;";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) { ?>

            <table>
                <tr>
                    <th>Course Type</th>
                    <th>Course Level</th>
                    <th>Course Name</th>
                    <th>Credits</th>
                    <th>Date and Time</th>
                    <th>Location</th>
                    <th>Professor</th>
                </tr>
            <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>" . $row["courseMajor"] . "</td><td>" . $row['courseLevel'] . "</td><td>" . $row['courseName'] . "</td><td>" . $row['numCredits'] . "</td><td>" . $row['dayTime'] . "</td><td>" . $row['location'] . "</td><td>" . $row['professor'] . "</td></tr>";
                }
                echo "</table>";
            }
            else { 
                echo "You have no courses added in your class schedule!";
            }
        ?>
            <hr>

            </table>

        <!--Creates an input textbox that allows users to enter their course numbers-->
        <!--Connect to the database 'editprofile.inc.php'-->
        <h2>Add Classes to your Schedule</h2>
        <form action="../includes/editprofile.inc.php" method="POST" style="border:2px solid blue; width: 50%">
          <div class="container">

            <hr>

            <label for="course_num"><b>Enter the 5 digit course number to add a class to your schedule:</b></label>
            <input type="text" id="course_num" name="course_num" placeholder="5 digit course number:">
            <br>
            
            <div class="clearfix"></div>
              <button type="submit" name="submit" onclick="alert('Course has been added to your schedule!')">Submit Course</button>
            </div>
          </div>
        </form>

    </body>
</html>