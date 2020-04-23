<!--Require header.php for same format-->
<?php
    require "header.php";
?>

    <main>
        <?php 
            //if session is active, show logged in message. If not, show user is logged out
            if (isset($_SESSION['userId'])) {
                echo '<p>You are logged in!</p>';
            }
            else {
                echo '<p>You are logged out!</p>';
            }
        ?>
    </main>

<?php
    require "footer.php";
?>