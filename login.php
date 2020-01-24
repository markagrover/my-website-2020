<?php
/**
 * Created by PhpStorm.
 * User: markgrover
 * Date: 1/18/20
 * Time: 6:04 PM
 */
session_start();
include_once 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="login.css">
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    </head>
    <body>

        <div class="loginContainer">

            <div class="loginMessage"></div>
            <form class="loginForm" action="login.php" method="post">
                <h2 class="formTitle">
                    Login
                </h2>
                <?php
                if(isset($_POST['username'])) {
                    $username = $_POST['username'];
                    $pass = $_POST['password'];
                    $sql = "SELECT * FROM users WHERE username='$username' && password='$pass'";
                    $result = $conn->query($sql);
                    if ($result->rowCount() > 0) {
                        $_SESSION['logged_in'] = 'true';
                        $_SESSION['username'] = $username;
                        echo '<script>
                                    var form = document.querySelector(".loginForm");
                                    form.remove();
                                    var message = document.querySelector(".loginMessage");
                                    message.innerHTML = "Logging In!";
                                    setTimeout(function(){
                                        window.location.href = "admin.php";
                                    },200);
                                    
                              </script>';
                    } else {
                        echo "<p class='warning'>wrong username or password</p>";
                    }
                }
                ?>

                <div class="inputGroup">
                    <input type="text" name="username" placeholder="User Name">
                </div>
                <div class="inputGroup">
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="inputGroup">
                    <button class="submit">Submit</button>
                </div>
            </form>

        </div>

    </body>
</html>

