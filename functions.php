<?php
/**
 * Created by PhpStorm.
 * User: markgrover
 * Date: 1/25/20
 * Time: 8:04 PM
 */


function truncate($text, $chars = 200) {
    if(strlen($text) > $chars) {
        $text = $text.' ';
        $text = substr($text, 0, $chars);
        $text = substr($text, 0, strrpos($text ,' '));
        $text = $text.'...';
    }
    return $text;
}

function scanFolder($dir){
    $fileNames = scandir($dir);
    foreach($fileNames as $fileName){
        if($fileName == '.'){

        } elseif($fileName == '..'){

        } else {
            echo "<p class='fileName'>blog_images/" . $fileName . "<img class='thumbnail' src='blog_images/" . $fileName . "' height='50px'></p><br>";
        }

    }
}

function getAllBlogPosts(){
    include 'db_connection.php';
    $sql = "SELECT * FROM post WHERE status=1";
    $result = $conn->query($sql);
    if ($result->rowCount() > 0) {
        echo '<div class="articlesContainer">';
        echo '<div class="row">';
        foreach($result as $row){
            echo '<a href=article.php?id='. $row['id'] . '>';
            echo '<div class="blogArticle">';
            echo '<h2 class="blogPostTitle">'. $row['title'] .'</h2>';
            echo '<p class="blogPostDate">Published On '. $row['date'] .'</p>';
            echo '<div class="blogContainer">';
            if($row['img'] != ''){
                echo '<img class="blogImage" src="'. $row['img'] .'"/>';
            }
            echo '<div class="blogContent">';
            echo '<div class="blogExcerpt">'. $row['excerpt'] .'</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</a>';

        }
        echo '</div>';
        echo '</div>';
    }
}

function getBlogPost(){
    include 'db_connection.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM post WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->rowCount() > 0) {
        foreach($result as $row){

            echo '<div class="blogArticle">';
            echo '<h1 class="blogPostTitle">'. $row['title'] .'</h1>';
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
                echo '<a href="edit_blog.php?id='. $row['id']. '"><i class="far fa-edit"></i></a>';
            }


            echo '<p class="blogPostDate">Published on '. $row['date'] .'</p>';
            echo '<div class="blogContainer">';
            if($row['img'] != ''){
                echo '<img class="blogImage" src="'. $row['img'] .'"/>';
            }
            echo '<div class="blogContent">';
            echo '<div class="blogBody">'. $row['body'] .'</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

        }
    }
}

function getBlogPosts($limit){
    include 'db_connection.php';
    $sql = "SELECT * FROM post WHERE status=1 LIMIT $limit";
    $result = $conn->query($sql);
    if ($result->rowCount() > 0) {
        echo '<div class="horizontalLine"></div>';
        echo '<h2 id="blogPost" class="title blogTitle">Articles</h2>';
        echo '<div class="horizontalLine"></div>';
        echo '<div class="blogPostContainer">';
        foreach($result as $row){
            echo '<a class="articleLink" href="article.php?id=' . $row['id'] . '"';
            echo '<div class="blogArticle">';
            echo '<h2 class="blogPostTitle">'. $row['title'] .'</h2>';
//            echo '<p class="blogPostDate">Published On '. $row['date'] .'</p>';
            echo '<div class="blogContainer">';
            if($row['img'] != ''){
                echo '<img class="blogImage" src="'. $row['img'] .'"/>';
            }
            echo '<div class="blogContent">';

            echo '<div class="blogExcerpt">'. $row['excerpt'] .'</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</a>';
        }
        echo '<a href="articles.php"><button class="viewPosts">View All Blog Posts</button></a>';
        echo '</div>';
    }
}

function edit_post_form(){
    include 'db_connection.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM post WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->rowCount() > 0) {
        foreach ($result as $row) {
            echo '<div class="sidebar">';
            echo '<div class="id">' . $id . '</div>';

            echo '<div class="featuredTitle">';
            echo '<h2>Featured Image</h2>';
            echo '</div>';
            echo '<div class="featuredImageContainer">';
            echo '<img class="featuredImage" src="' . $row['img'] . '"/>';
            echo '</div>';
            echo '</div>';
            echo '<form class="blogPostForm" action="#" method="post" enctype="multipart/form-data">';
            echo '<label for="title">Blog Title</label>';
            echo '<input value="' . $row['title'] . ' " type="text" class="blogInput form-control" name="title">';
            echo '<label for="body">Blog Content</label>';
            echo '<textarea class="form-control content" name="body" id="body" cols="30" rows="10">' . $row['body'] . '</textarea>';
            echo '<label for="imageToUpload">Upload Featured Image</label>';
            echo '<input class="imgInput" type="file" name="imageToUpload">';
            echo '<input value="' . $row['id'] . '" type="text" name="id" hidden>';
            echo '<button class="btn btn-primary" type="submit">Edit Blog Post</button>';
            echo '</form>';
        }
    }
}

function recent_post(){
    include 'db_connection.php';




    echo '<div class="recentPostContainer">';
    $sql = "SELECT * FROM post WHERE status=1";
    $result = $conn->query($sql);
    if($result->rowCount() > 0){
        echo '<div class="recentPostTitle">';
        echo '<h2>Recent Post</h2>';
        echo '</div>';
        echo '<div class="recentPost">';

        echo '<div class="postContainer">';
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
}
