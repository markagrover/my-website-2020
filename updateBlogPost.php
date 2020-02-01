<?php
/**
 * Created by PhpStorm.
 * User: markgrover
 * Date: 1/29/20
 * Time: 7:11 PM
 */
include_once 'functions.php';

if(isset($_POST['title'])){
    if($_FILES['imageToUpload']['name'] != ''){
        $target_dir = "blog_images/";
        $target_file = $target_dir . basename($_FILES["imageToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["imageToUpload"]["tmp_name"]);
            if($check !== false) {
//            echo "<p class='errorMessage'>File is an image - " . $check["mime"] . ".</p>";
                $uploadOk = 1;
            } else {
                echo "<p class='errorMessage'>File is not an image.</p>";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "<p class='errorMessage'>File already exists. Everything is OK</p>";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["imageToUpload"]["size"] > 500000) {
            echo "<p class='errorMessage'>Sorry, your file is too large.</p>";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && $imageFileType != "svg") {
            echo "<p class='errorMessage'>Sorry, only JPG, JPEG, PNG, SVG & GIF files are allowed.</p>";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
//        echo "<p class='errorMessage'>Sorry, your file was not uploaded.</p>";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file)) {
                echo "<p class='errorMessage'>The file ". basename( $_FILES["imageToUpload"]["name"]). " has been uploaded.</p>";
            } else {
                echo "<p class='errorMessage'>Sorry, there was an error uploading your file.</p>";
            }
        }
    }

if($_FILES['imageToUpload']['name'] != ''){
    $imageLocation = $target_dir . basename($_FILES['imageToUpload']['name']);
    $body = $_POST['body'];;
    $excerpt = truncate(strip_tags($body));
    $title = htmlspecialchars($_POST['title']);
    $id = $_POST['id'];
    $date = date("Y/m/d");
    $data = [$imageLocation, $title, $body, $excerpt, $date, $id];
    try {
        $sql = "UPDATE post SET img=?, title=?, body=?, excerpt=?, date=? WHERE id=?";
        $stmt= $conn->prepare($sql);
        $stmt->execute($data);
        echo '<script> window.location = "article.php?id='. $id. '"; </script>';

    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
} else {
    $body = $_POST['body'];;
    $excerpt = truncate(strip_tags($body));
    $title = htmlspecialchars($_POST['title']);
    $date = date("Y/m/d");
    $id = $_POST['id'];
    $data = [$title, $body, $excerpt, $date, $id];
    try {
        $sql = "UPDATE post SET title=?, body=?, excerpt=?, date=? WHERE id=?";
        $stmt= $conn->prepare($sql);
        $stmt->execute($data);
        echo '<script> window.location = "article.php?id='. $id. '"; </script>';

    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }


}
}