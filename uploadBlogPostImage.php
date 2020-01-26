<?php
/**
 * Created by PhpStorm.
 * User: markgrover
 * Date: 1/25/20
 * Time: 8:01 PM
 */
include_once 'functions.php';

if(isset($_POST['title'])){
    $target_dir = "blog_images/";
    $target_file = $target_dir . basename($_FILES["imageToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imageToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["imageToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "svg") {
        echo "Sorry, only JPG, JPEG, PNG, SVG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["imageToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $imageLocation = $target_dir . basename($_FILES['imageToUpload']['name']);
    $body = htmlspecialchars($_POST['body']);;
    $excerpt = truncate($body);
    $title = htmlspecialchars($_POST['title']);;


    $data = [$imageLocation, $title, $body, $excerpt];
    try {
        $sql = "INSERT INTO post (img, title, body, excerpt) VALUES (?,?,?,?)";
        $stmt= $conn->prepare($sql);
        $stmt->execute($data);
        echo '<p> Post Uploaded</p>';
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

}