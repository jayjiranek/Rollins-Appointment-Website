<?php
    //checks if the signup button was clicked
    if (isset($_POST['signup-submit'])){

        require 'dbh.inc.php';

        $username = $_POST['uid'];
        $email = $_POST['mail'];
        $password = $_POST['pwd'];
        $passwordRepeat = $_POST['pwd-repeat'];
        //addition
        $rnumber = $_POST['rnumber'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];

        //checks if all the fields are filled in
        //added rnumber at the end
        if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat) || empty($rnumber) || empty($first_name) || empty($last_name)){
            header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
            exit();
        }
        //checks if the user entered both a valid email and username
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: ../signup.php?error=invalidmailuid");
            exit();
        }
        //checks if the user entered a valid email
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: ../signup.php?error=invalidmail&uid=".$username);
            exit();
        }
        //checks if the user entered a valid username
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            header("Location: ../signup.php?error=invaliduid&mail=".$email);
            exit();
        }
        //checks if the password and passwordRepeat are equal to each other
        else if ($password !== $passwordRepeat) {
            header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
            exit();
        }
        //checks if username is already inside of the database
        else {
            $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
            $stmt = mysqli_stmt_init($conn);
            //checks if there is a connection to the database
            if (!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../signup.php?error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                //checks if username is taken, returns 1 if taken, returns 0 if not taken
                if ($resultCheck > 0) {
                    header("Location: ../signup.php?error=usertaken&mail=".$email);
                    exit();
                }
                //inserts users information into the database
                else {
                    //added rnumber here
                    $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers, rnumber, first_name, last_name) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../signup.php?error=sqlerror");
                        exit();
                    }
                    //method to hash the users password in the database, then submit a success message
                    else {
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                        //added rnumber here
                        mysqli_stmt_bind_param($stmt, "sssiss", $username, $email, $hashedPwd, $rnumber, $first_name, $last_name);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../homeindex.php?signup=success");
                        exit();
                    }
                }
            }
        }
        //close the connection to the database after user has signed up
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }

    else {
        header("Location: ../signup.php");
        exit();
    }