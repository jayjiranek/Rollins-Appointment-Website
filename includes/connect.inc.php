<!--PHP script to connect to table in database and insert values from appointment form into a table-->

<?php
    //attributes
    $rnumber = $_POST['rnumber'];
    $fullname = $_POST['fullname'];
    $reason = $_POST['reason'];
    $counselor = $_POST['counselor'];
    $day = $_POST['day'];

    //Database Connection
    $conn = new mysqli('localhost', 'root', '', 'loginsystem');
    if ($conn->connect_error){
        die('Connection Failed : ' .$conn->connect_error);
    }

    //Execute and submit values from user into database
    else{
        $stmt = $conn->prepare("INSERT INTO wellnessform(rnumber, fullname, reason, counselor, day) VALUES(?, ?, ?, ?, ?);");
        $stmt->bind_param("issss", $rnumber, $fullname, $reason, $counselor, $day);
        $stmt->execute();
        echo "Form submitted successfully...";
        $stmt->close();
        $conn->close();
        header("Location: ../homeindex.php");
    }

?>