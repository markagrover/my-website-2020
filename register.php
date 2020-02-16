<?php
/**
 * Created by PhpStorm.
 * User: markgrover
 * Date: 2/14/20
 * Time: 2:37 PM
 */
include_once 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="css/register.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:500i&display=swap" rel="stylesheet">
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/8bad5e6eb3.js" crossorigin="anonymous"></script>
    </head>
    <body>
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
        <div class="registerContainer">

            <div class="registerMessage"></div>
            <form class="registrationForm" action="#" method="post">
                <h2 class="formTitle">Register</h2>
<?php
    if(isset($_POST['username'])){
        if($_POST['password'] != $_POST['passwordConfirm']){
            echo "<p class='warning'>Passwords are not the same</p>";
        } else {
            // check to see if username already exist in db
            $username = $_POST['username'];
            $data = [$username];
            try {
                $sql = "SELECT * FROM users WHERE username = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute($data);
                $result = $stmt->fetchAll();
                if($stmt->rowCount() > 0){
                    echo "<p class='warning'>Username Already Taken.</p>";
                } else {
                    $data = [$_POST['username'], password_hash($_POST['password'], PASSWORD_DEFAULT)];
                    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute($data);

                    echo '<script>
                        window.location.href = "login.php";
                    </script>';
                }

            } catch (Exception $e) {
                echo 'Caught exception', $e-getMessage();
            }

        }

    }

?>

<div class="inputGroup">
    <input type="text" name="username" placeholder="User Name">
</div>
<div class="inputGroup">
    <input id="password" type="password" name="password" placeholder="Password">
</div>
 <div class="inputGroup">
     <input id="passwordConfirm" type="password" name="passwordConfirm" placeholder="Confirm Password">
 </div>
<div class="inputGroup">
    <button class="submit">Register</button>
</div>
</form>

</div>
<script type="text/javascript" src="js/toggleMobileNav.js"></script>
</body>
</html>