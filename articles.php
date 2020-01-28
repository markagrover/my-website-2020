<?php
/**
 * Created by PhpStorm.
 * User: markgrover
 * Date: 1/26/20
 * Time: 11:37 AM
 */
include_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Raleway:500i&display=swap" rel="stylesheet">
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/8bad5e6eb3.js" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <link rel="stylesheet" href="css/articles.css">
    </head>
    <body>
    <header>
        <div class="logo"><img src="images/logo.svg" alt=""></div>
        <nav>
            <ul class="hideNav navigation">

                <li><a class="indexLink" href="index.php">Home</a></li>
            </ul>
            <a href="#" class="hamburgerIcon"">
            <!--                <span class="bar"></span>-->
            <!--                <span class="bar"></span>-->
            <!--                <span class="bar"></span>-->
            <i class="fa fa-bars"></i>
            </a>
        </nav>
    </header>
    <?php
    getAllBlogPosts();
    ?>
    <script type="text/javascript" src="js/toggleMobileNav.js"></script>
    <script type="text/javascript" src="js/matchHeightJquery.js"></script>
    <script type="text/javascript" src="js/articles.js"></script>
    </body>
</html>
