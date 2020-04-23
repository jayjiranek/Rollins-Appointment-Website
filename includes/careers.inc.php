<!--PHP script to connect to table in database and insert values from appointment form into a table-->

<?php
    //attributes
    $rnumber = $_POST['rnumber'];
    $full_name = $_POST['full_name'];
    $reason = $_POST['reason'];
    $day_time = $_POST['day_time'];

    //Database Connection
    $conn = new mysqli('localhost', 'root', '', 'loginsystem');
    if ($conn->connect_error){
        die('Connection Failed : ' .$conn->connect_error);
    }
    //Execute and submit values from user into database
    else{
        $stmt = $conn->prepare("INSERT INTO career(rnumber, full_name, reason, day_time) VALUES(?, ?, ?, ?);");
        $stmt->bind_param("isss", $rnumber, $full_name, $reason, $day_time);
        $stmt->execute();
        echo "Form submitted successfully...";
        $stmt->close();
        $conn->close();
        header("Location: ../homeindex.php");
    }

?>