<?php
/**
 * Created by PhpStorm.
 * User: markgrover
 * Date: 2/16/20
 * Time: 3:36 PM
 */include_once 'db_connection.php';


try {
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id ='$id'";
    $stmt= $conn->prepare($sql);
    $stmt->execute();
    echo '<script> window.location.href = "users.php";</script>';

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}