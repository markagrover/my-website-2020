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
        <link rel="stylesheet" href="css/article.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:500i&display=swap" rel="stylesheet">
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/8bad5e6eb3.js" crossorigin="anonymous"></script>

    </head>
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
    <body>
    <?php
    if(isset($_GET['id'])){
        getBlogPost();
    }
    ?>
    <script type="text/javascript" src="js/toggleMobileNav.js"></script>
    </body>
</html>
