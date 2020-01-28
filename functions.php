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
    $sql = "SELECT * FROM post";
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
            echo '<img class="blogImage" src="'. $row['img'] .'"/>';
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
    $sql = "SELECT * FROM post WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->rowCount() > 0) {
        foreach($result as $row){

            echo '<div class="blogArticle">';
            echo '<h1 class="blogPostTitle">'. $row['title'] .'</h1>';
            echo '<p class="blogPostDate">Published on '. $row['date'] .'</p>';
            echo '<div class="blogContainer">';
            echo '<img class="blogImage" src="'. $row['img'] .'"/>';
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
    $sql = "SELECT * FROM post LIMIT $limit";
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
            echo '<img class="blogImage" src="'. $row['img'] .'"/>';
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
