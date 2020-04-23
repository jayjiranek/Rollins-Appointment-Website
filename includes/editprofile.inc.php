<!--PHP script to connect to table in database and insert values from appointment form into a table-->

<?php
    //attributes
    $course_num = $_POST['course_num'];

    //Database Connection
    $conn = new mysqli('localhost', 'root', '', 'loginsystem');
    if ($conn->connect_error){
        die('Connection Failed : ' .$conn->connect_error);
    }
    //Execute and submit values from user into database
    else{
        $stmt = $conn->prepare("INSERT INTO course_log(course_num) VALUES(?);");
        $stmt->bind_param("i", $course_num);
        $stmt->execute();
        echo "Form submitted successfully...";
        $stmt->close();
        $conn->close();
        header("Location: ../edityourprofile/editprofile.php");
    }

?>