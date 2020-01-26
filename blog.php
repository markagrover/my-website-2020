<?php
/**
 * Created by PhpStorm.
 * User: markgrover
 * Date: 1/25/20
 * Time: 2:26 PM
 */
session_start();
include_once 'functions.php';
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){ ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Blog</title>
        <link href="https://fonts.googleapis.com/css?family=Raleway:500i&display=swap" rel="stylesheet">
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/8bad5e6eb3.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="rich_text_editor/src/richtext.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <link rel="stylesheet" href="blog.css">

    </head>
    <body>
        <header>
            <div class="logo"><img src="images/logo.svg" alt=""></div>
            <nav>
                <ul class="hideNav navigation">

                    <li><a class="indexLink" href="index.php">Home</a></li>
                    <li class="blogLink"><a href="blog_post.php">Blog</a></li>
                    <li class="adminLink"><a href="admin.php">Admin</a></li>
                    <li class="logoutLink"><a href="logout.php">Logout</a></li>
                </ul>
                <a href="#" class="hamburgerIcon"">
                <!--                <span class="bar"></span>-->
                <!--                <span class="bar"></span>-->
                <!--                <span class="bar"></span>-->
                <i class="fa fa-bars"></i>
                </a>
            </nav>
        </header>
        <h1 class="blogTitle">
            Add Blog Post
        </h1>
        <div class="imageUpload">
            <?php
                include_once 'uploadRichTextImage.php';
            ?>

            <form class="inlineImageForm" action="#" method="post" enctype="multipart/form-data">
                <h2 style="text-align: center; border-bottom: 2px solid #4F3928; padding: 10px; text-shadow: 2px 2px 3px black;:">Inline Images</h2>
                <h4 class="imageFilesTitle">Uploaded Images</h4>
                <p class="subTitle">(Click To Copy)</p>
                <div class="imageFiles">
                    <?php
                        scanFolder('blog_images');
                    ?>
                </div>
                <input type="text" name="submitImg" hidden>
                <label for="imgUpload">Upload Image</label>
                <input class="inlineImgInput" type="file" name="imgUpload">
                <button class="image-btn btn btn-sm btn-primary" type="submit">Upload Image</button>
            </form>
        </div>
        <div class="formContainer">
            <?php
            } else {
                header("location: login.php");
            }

            include_once 'db_connection.php';
            // truncate function
            include_once 'uploadBlogPost.php';

            ?>

            <form class="blogPostForm" action="#" method="post" enctype="multipart/form-data">
                <label for="title">Blog Title</label>
                <input type="text" class="blogInput form-control" name="title">
                <label for="body">Blog Content</label>
                <textarea class="form-control content" name="body" id="body" cols="30" rows="10"></textarea>
                <label for="imageToUpload">Upload Blog Image</label>
                <input class="imgInput" type="file" name="imageToUpload">
                <button class="btn-primary" type="submit">Submit Blog Post</button>
            </form>
        </div>
        <script src="blog.js"></script>
        <script type="text/javascript" src="rich_text_editor/src/jquery.richtext.js"></script>
        <script>
            $('.content').richText();
        </script>
    </body>
</html>

