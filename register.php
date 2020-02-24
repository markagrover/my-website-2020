<?php
/**
 * Created by PhpStorm.
 * User: markgrover
 * Date: 2/14/20
 * Time: 2:37 PM
 */
include_once 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="css/register.css">
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
        <div class="registerContainer">

            <div class="warning registerMessage"></div>
            <form class="registrationForm" action="registerFormData.php" method="post">
                <h2 class="formTitle">Register</h2>
                <div class="inputGroup">
                    <input id="username" type="text" name="username" placeholder="User Name">
                </div>
                  <div class="inputGroup">
                      <input id="email" type="text" name="email" placeholder="Email">
                  </div>
                <div class="inputGroup">
                    <input id="password" type="password" name="password" placeholder="Password">
                </div>
                 <div class="inputGroup">
                     <input id="passwordConfirm" type="password" name="passwordConfirm" placeholder="Confirm Password">
                 </div>
                <div class="inputGroup">
                    <button class="submit">Register</button>
                </div>
            </form>

        </div>
    <script type="text/javascript" src="js/toggleMobileNav.js"></script>
    <script type="text/javascript" src="js/register.js"></script>
</body>
</html>