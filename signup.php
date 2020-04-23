<!--Start a session after user has signed up correctly-->
<?php
    session_start();
?>

    <main>
        <head> 
            <meta charset="utf-8">
            <link rel="stylesheet" href="signupstyle.css">
            <title>Sign Up for Rollins Appointments</title>
        </head>
            <!--PHP script to check that the user filled out the information-->
            <?php
                //error messages if something isn't filled out or not correct
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyfields") {
                        echo '<p>Fill in all the fields!</p>';
                    }
                    else if ($_GET['error'] == "invalidmailuid") {
                        echo '<p>Invalid E-mail and Username!</p>';
                    }
                    else if ($_GET['error'] == "invaliduid") {
                        echo '<p>Invalid Username!</p>';
                    }
                    else if ($_GET['error'] == "invalidmail") {
                        echo '<p>Invalid E-mail</p>';
                    }
                    else if ($_GET['error'] == "passwordcheck") {
                        echo '<p>Your passwords do not match!</p>';
                    }
                    else if ($_GET['error'] == "usertaken") {
                        echo '<p>Username already taken!</p>';
                    }
                }
                //success message for a successful login
                else if (isset($_GET['signup']) == "success") {
                    echo '<p>Signup successful!</p>';
                    header("Location: /homeindex.php");
                    exit();
                }
            ?>

            <!--Create a form for the user to enter information while signing up-->
            <form action="includes/signup.inc.php" method="post">
                <div class="container">
                    <h1>Sign Up</h1>
                    <hr>

                    <label for="uid"><b>Username: </b></label>
                    <input type="text" name="uid" placeholder="Username">

                    <label for="mail"><b>E-Mail: </b></label>
                    <input type="text" name="mail" placeholder="E-mail">

                    <label for="pwd"><b>Password: </b></label>
                    <input type="password" name="pwd" placeholder="Password">

                    <label for="pwd-repeat"><b>Repeat Password: </b></label>
                    <input type="password" name="pwd-repeat" placeholder="Repeat Password">

                    <label for="rnumber"><b>R-Number: </b></label>
                    <input type="text" name="rnumber" placeholder="Enter your R-Number">

                    <label for="first_name"><b>First Name: </b></label>
                    <input type="text" name="first_name" placeholder="Enter your First Name">

                    <label for="last_name"><b>Last Name: </b></label>
                    <input type="text" name="last_name" placeholder="Enter your Last Name">

                    <div class="clearfix">
                        <button type="submit" name="signup-submit">Signup</button>
                    </div>
                </div>
            </form>
    </main>

<?php
    require "footer.php";
?>