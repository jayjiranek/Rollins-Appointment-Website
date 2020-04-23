<?php
    //if user clicks logout button, end the session and return to homepage
    session_start();
    session_unset();
    session_destroy();
    header ("Location: ../index.php");