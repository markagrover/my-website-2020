<?php
/**
 * Created by PhpStorm.
 * User: markgrover
 * Date: 1/26/20
 * Time: 11:37 AM
 */
include_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>

    </head>
    <body>
    <?php
    if(isset($_GET['id'])){
        getBlogPost();

    }
    ?>
    </body>
</html>
