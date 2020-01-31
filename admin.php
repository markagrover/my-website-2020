<?php
/**
 * Created by PhpStorm.
 * User: markgrover
 * Date: 1/22/20
 * Time: 2:01 PM
 */
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){ ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link href="https://fonts.googleapis.com/css?family=Raleway:500i&display=swap" rel="stylesheet">
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/8bad5e6eb3.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <link rel="stylesheet" href="css/admin.css">
    </head>
    <body>
    <header>
        <div class="logo"><img src="images/logo.svg" alt="logo"></div>

        <nav>
            <ul class="hideNav navigation">
                <li><a class="indexLink" href="index.php">Home</a></li>
                <li><a class="logoutLink" href="logout.php">Logout</a></li>
                <li><a class="blogLink" href="blog.php">Blog Post</a></li>
            </ul>
            <a href="#" class="hamburgerIcon"">
            <i class="fa fa-bars"></i>
            </a>
        </nav>
    </header>

    <div class="tableContainer">
        <h2 class="tableHeading">Prospective Clients</h2>
        <table class="table table-striped table-responsive">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Delete</th>
            </tr>
            <?php
            include_once 'db_connection.php';
            $sql = "SELECT * FROM messages";
            $result = $conn->query($sql);

            if($result->rowCount() > 0){
                foreach($result as $row){
                    $id = $row['id'];
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['comment'] . "</td>";
                    echo "<td class='delete'><a class='deleteRecord btn btn-primary' href=\"delete.php?id=$id\">X</a></td>";
                    echo "</tr>";
                }
            }

            ?>
        </table>
    </div>
    </body>
    <script src="js/admin.js"></script>
<!--    <script type="text/javascript" src="js/toggleMobileNav.js"></script>-->
    </html>
<?php
} else {
    header("location: login.php");
}
?>

