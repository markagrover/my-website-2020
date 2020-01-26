<?php
/**
 * Created by PhpStorm.
 * User: markgrover
 * Date: 1/25/20
 * Time: 7:56 PM
 */
if(isset($_POST["submitImg"])) {
    $target_dir = "blog_images/";
    $target_file = $target_dir . basename($_FILES["imgUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
    if (isset($_POST["submitImg"])) {
        $check = getimagesize($_FILES["imgUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "<p class='errorMessage'>File is not an image.</p>";
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {
        echo "<p class='errorMessage'>Sorry, file already exists.</p>";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["imgUpload"]["size"] > 500000) {
        echo "<p class='errorMessage'>Sorry, your file is too large.</p>";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "<p class='errorMessage'>Sorry, only JPG, JPEG, PNG, & GIF files are allowed.</p>";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<p class='errorMessage'>Sorry, your file was not uploaded.</p>";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["imgUpload"]["tmp_name"], $target_file)) {
            echo '<h3 class="imageLocation">Success!</h3>';
        } else {
            echo "<p class='errorMessage'>Sorry, there was an error uploading your file.</p>";
        }
    }
}