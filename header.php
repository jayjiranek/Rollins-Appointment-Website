<!-- starts the session to keep the user logged in on other pages of website -->
<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <meta name="description" content="This is an example of a meta description">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <title>Rollins Organizer</title>
    </head>
    <body>
        <header>
            <div id="leftside">
                <div class="text">
                    <label>With this site you can: </label>
                    <!--Display for the left side of the home page-->
                    <ul>
                        <li>Schedule and Manage your appointments</li>
                        <li>See your course and extracurricular Schedule</li>
                        <li>Stay up to date with the Rollins Community</li>
                        <li>and more!!!</li>
                    </ul>
                </div>
            </div>

            <nav>
                
                <div>
                    <div id="rightside">
                        <div class="login">            
                            <h1>Login in to better organize your life at Rollins</h1>
                            <?php
                                //if the session is ongoing (user logged in), then show a logout button to logout
                                if (isset($_SESSION['userId'])) {
                                    echo '<form action="includes/logout.inc.php" method="post">
                                    <button type="submit" name="logout-submit">Logout</button>
                                    </form>';
                                    if (isset($_GET['login']) == "success"){
                                        header("Location: /login/index.php");
                                        exit();
                                    }
                                }
                                //if session isn't active, keep login and signup buttons
                                else {
                                    echo '<form action="includes/login.inc.php" method="post">
                                    <label for="mailuid"><b>Rollins username: </b></label>
                                    <input type="text" name="mailuid" placeholder="Username/E-mail...">

                                    <label for="pwd"><b>Password: </b></label>
                                    <input type="password" name="pwd" placeholder="Password...">
                                    <div class="container">
                                        <button type="submit" name="login-submit">Login</button>
                                    </div>
                                </form>
                                <a href="signup.php">Sign Up</a>';
                                }
                            ?>
                        </div>
                        <img src="img/tars.jpeg" alt="logo">
                    </div>
                    
                    <!--Creates a bar at bottom of screen with external links-->
                    <div class="bottombar">
                        <ul>
                            <li><a href= "https://360.rollins.edu">Rollins News</a></li>
                            <li><a href="https://go.activecalendar.com/rollins">Upcoming Rollins Events</a></li>
                            <li><a href="https://rollins.edu/about-rollins/contact-us">Contact Rollins</a></li>
                        </ul>
                    </div> 

                </div>

            </nav>
        </header>


        