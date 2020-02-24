<?php
/**
 * Created by PhpStorm.
 * User: markgrover
 * Date: 1/18/20
 * Time: 6:04 PM
 */
session_start();
include_once 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="css/login.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:500i&display=swap" rel="stylesheet">
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/8bad5e6eb3.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <header>
        <div class="logo"><img src="images/logo.svg" alt=""></div>
        <nav>
            <ul class="hideNav navigation">

                <li><a class="indexLink" href="index.php">Home</a></li>
                <li class="blogPostsLink"><a href="articles.php">Blog Articles</a></li>

            </ul>
            <a href="#" class="hamburgerIcon"">
            <!--                <span class="bar"></span>-->
            <!--                <span class="bar"></span>-->
            <!--                <span class="bar"></span>-->
            <i class="fa fa-bars"></i>
            </a>
        </nav>
    </header>
        <div class="loginContainer">

            <div class="loginMessage"></div>
            <form class="loginForm" action="#" method="post">
                <h2 class="formTitle">
                    Login
                </h2>
                <?php
                if(isset($_POST['username'])) {
                    $username = $_POST['username'];
                    $pass = $_POST['password'];
                    $sql = "SELECT * FROM users WHERE username='$username'";
                    $result = $conn->query($sql);
                    if ($result->rowCount() > 0) {

                        foreach ($result as $row) {
                            if (password_verify($pass, $row['password'])) {
                                if ($row['status'] == 1) {
                                    $_SESSION['logged_in'] = 'true';
                                    $_SESSION['username'] = $username;
                                    $_SESSION['admin'] = $row['role'];
                                    echo '<script>
                                    var form = document.querySelector(".loginForm");
                                    form.remove();
                                    var message = document.querySelector(".loginMessage");
                                    message.innerHTML = "Logging In!";
                                    setTimeout(function(){
                                        window.location.href = "admin.php";
                                    },200);
                              </script>';
                                } else {
                                    echo '<p class="warning">Your Not Registered. Please wait 24-48hrs for our staff to activate your membership.</p>';
                                }
                                echo '<p class="warning">Username Password Combo not Working!</p>';
                            } else {
                                echo '<p class="warning">Username Password Combo not Working!</p>';
                            }
                        }
                    } else {
                        echo "<p class='warning'>wrong username or password</p>";
                    }
                }
                ?>

                <div class="inputGroup">
                    <input type="text" name="username" placeholder="User Name">
                </div>
                <div class="inputGroup">
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="inputGroup">
                    <button class="submit">Submit</button>
                </div>
            </form>

        </div>
    <script type="text/javascript" src="js/toggleMobileNav.js"></script>
    </body>
</html>

