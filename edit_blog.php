<?php
/**
 * Created by PhpStorm.
 * User: markgrover
 * Date: 1/29/20
 * Time: 6:50 PM
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
    <link rel="stylesheet" href="css/blog.css">
    <link rel="stylesheet" href="css/editBlog.css">

</head>
<body>
<header>
    <div class="logo"><img src="images/logo.svg" alt=""></div>
    <nav>
        <ul class="hideNav navigation">

            <li><a class="indexLink" href="index.php">Home</a></li>
            <li class="blogLink"><a href="articles.php">Blog</a></li>
            <li class="adminLink"><a href="admin.php">Admin</a></li>
            <li class="logoutLink"><a href="logout.php">Logout</a></li>
        </ul>
        <a href="#" class="hamburgerIcon"">
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
        <div class="inlineImageInputGroup">
            <input type="text" name="submitImg" hidden>
            <label for="imgUpload">Upload Image</label>
            <input class="inlineImgInput" type="file" name="imgUpload">
            <button class="image-btn btn btn-sm btn-primary" type="submit">Upload Image</button>
        </div>

    </form>
</div>
<div class="formContainer">
    <?php
    } else {
        header("location: login.php");
    }

    include_once 'db_connection.php';

    include_once 'updateBlogPost.php';

    $id = $_GET['id'];
    $sql = "SELECT * FROM post WHERE id = $id";
    $result = $conn->query($sql);
    if($result->rowCount() > 0){
        foreach ($result as $row){
            echo '<div class="sidebar">';
            echo '<div class="featuredTitle">';
            echo '<h2>Featured Image</h2>';
            echo '</div>';
            echo '<div class="featuredImageContainer">';
            echo '<img class="featuredImage" src="'. $row['img'] . '"/>';
            echo '</div>';
            echo '<div class="recentPostTitle">';
            echo '<h2>Recent Post</h2>';
            echo '</div>';
            echo '<div class="recentPost">';

            echo '<div class="postContainer">';

            echo '<div class="recentPostContainer">';
            $sql = "SELECT * FROM post";
            $result = $conn->query($sql);
            if($result->rowCount() > 0){
                foreach ($result as $row) {
                    echo '<a href=article.php?id='. $row['id'] . '>';
                    echo '<div class="post">';
                    echo '<img class="postImg" src="'. $row['img'] .'"/>';
                    echo '<div class="postTitle">';
                    echo '<h4>'. $row['title'] . '</h4>';
                    echo '</div>';
                    echo '<div class="postExcerpt">';
                    echo $row['excerpt'];
                    echo '</div>';
                    echo '<div class="postDate">';
                    echo $row['date'];
                    echo '</div>';
                    echo '</div>';
                    echo '</a>';
                }

            }
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<form class="blogPostForm" action="#" method="post" enctype="multipart/form-data">';
            echo '<label for="title">Blog Title</label>';
            echo '<input value="' . $row['title'] . ' " type="text" class="blogInput form-control" name="title">';
            echo '<label for="body">Blog Content</label>';
            echo '<textarea class="form-control content" name="body" id="body" cols="30" rows="10">'. $row['body'] .'</textarea>';
            echo '<label for="imageToUpload">Upload Featured Image</label>';
            echo '<input class="imgInput" type="file" name="imageToUpload">';
            echo '<input value="'. $row['id'] .'" type="text" name="id" hidden>';
            echo '<button class="btn btn-primary" type="submit">Edit Blog Post</button>';
            echo '</form>';

        }
    }
    ?>

</div>
<script src="js/blog.js"></script>
<script type="text/javascript" src="js/toggleMobileNav.js"></script>
<script type="text/javascript" src="rich_text_editor/src/jquery.richtext.js"></script>
<script>
    $('.content').richText();
</script>
</body>
</html>