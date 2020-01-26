<?php
/**
 * Created by PhpStorm.
 * User: markgrover
 * Date: 1/25/20
 * Time: 2:26 PM
 */
session_start();
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
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    </head>
    <body>
        <h1 class="blogTitle">
            Add Blog Post
        </h1>
        <div class="imageUpload">
            <?php
            if(isset($_POST["submitImg"])){

                $target_dir = "blog_images/";
                $target_file = $target_dir . basename($_FILES["imgUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                if(isset($_POST["submitImg"])) {
                    $check = getimagesize($_FILES["imgUpload"]["tmp_name"]);
                    if($check !== false) {
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
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif") {
                    echo "<p class='errorMessage'>Sorry, only JPG, JPEG, PNG, & GIF files are allowed.</p>";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "<p class='errorMessage'>Sorry, your file was not uploaded.</p>";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["imgUpload"]["tmp_name"], $target_file)) {
                        echo '<p class="imageLocation">' . $target_dir. basename( $_FILES["imgUpload"]["name"]) . '</p>';
                    } else {
                        echo "<p class='errorMessage'>Sorry, there was an error uploading your file.</p>";
                    }
                }
            }
            ?>
            <form action="#" method="post" enctype="multipart/form-data">
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
            function truncate($text, $chars = 200) {
                if(strlen($text) > $chars) {
                    $text = $text.' ';
                    $text = substr($text, 0, $chars);
                    $text = substr($text, 0, strrpos($text ,' '));
                    $text = $text.'...';
                }
                return $text;
            }
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

            ?>

            <form action="#" method="post" enctype="multipart/form-data">
                <label for="title">Blog Title</label>
                <input type="text" class="blogInput form-control" name="title">
                <label for="body">Blog Content</label>
                <textarea class="form-control content" name="body" id="body" cols="30" rows="10"></textarea>
                <label for="image">Image</label>
                <input class="imgInput" type="file" name="imageToUpload">
                <button class="form-control btn btn-primary" type="submit">Submit</button>
            </form>
        </div>

        <script type="text/javascript" src="rich_text_editor/src/jquery.richtext.js"></script>
        <script>
            $('.content').richText();
        </script>
    </body>
</html>

