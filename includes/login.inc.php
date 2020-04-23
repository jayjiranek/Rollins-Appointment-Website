<?php
    //checks if the login button was clicked
    if (isset($_POST['login-submit'])) {
        require 'dbh.inc.php';

        $mailuid = $_POST['mailuid'];
        $password = $_POST['pwd'];

        //checks if there are any empty fields for logging in
        if (empty($mailuid) || empty($password)) {
            header("Location: ../index.php?error=emptyfields");
            exit();
        }
        //statement to check if the user is inside of the database
        else {
            $sql = "SELECT * FROM users WHERE uidUsers=?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../index.php?error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $mailuid);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                //checks if the users password matches the one in the database
                if ($row = mysqli_fetch_assoc($result)) {
                    $pwdCheck = password_verify($password, $row['pwdUsers']);
                    if ($pwdCheck == false) {
                        header("Location: ../index.php?error=wrongpwd");
                        exit();
                    }
                    //logs the user in by starting a session
                    else if ($pwdCheck == true) {
                        session_start();
                        $_SESSION['userId'] = $row['idUsers'];
                        $_SESSION['userUid'] = $row['uidUsers'];
                        $_SESSION['rnum'] = $row['rnumber'];

                        header("Location: ../homeindex.php?login=success");
                        exit();
                        
                    }
                    else {
                        header("Location: ../index.php?error=wrongpwd");
                        exit();
                    }
                }
                else {
                    header("Location: ../index.php?error=nouser");
                    exit();
                }
            }
        }
    }
    else {
        header("Location: ../index.php");
        exit();
    }