<!--PHP script to connect to table in database and insert values from appointment form into a table-->

<?php
    //attributes
    $rnumber = $_POST['rnumber'];
    $fullname = $_POST['fullname'];
    $reason = $_POST['reason'];
    $appt_date = $_POST['appt_date'];

    //Database Connection
    $conn = new mysqli('localhost', 'root', '', 'loginsystem');
    if ($conn->connect_error){
        die('Connection Failed : ' .$conn->connect_error);
    }
    //Execute and submit values from user into database
    else{
        $stmt = $conn->prepare("INSERT INTO international(rnumber, fullname, reason, appt_date) VALUES(?, ?, ?, ?);");
        $stmt->bind_param("isss", $rnumber, $fullname, $reason, $appt_date);
        $stmt->execute();
        echo "Form submitted successfully...";
        $stmt->close();
        $conn->close();
        header("Location: ../homeindex.php");
    }

?>