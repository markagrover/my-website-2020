<?php
/**
 * Created by PhpStorm.
 * User: markgrover
 * Date: 2/2/20
 * Time: 10:18 AM
 */
include_once 'db_connection.php';


try {
    $id = $_GET['id'];
    $sql = "DELETE FROM post WHERE id ='$id'";
    $stmt= $conn->prepare($sql);
    $stmt->execute();
    echo '<script> window.location.href = "blogs.php";</script>';

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
