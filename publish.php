<?php
/**
 * Created by PhpStorm.
 * User: markgrover
 * Date: 2/2/20
 * Time: 10:00 AM
 */

include_once 'db_connection.php';
$id = $_GET['id'];

try {
    $sql = "UPDATE post SET status=? WHERE id=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([1,$id]);
    echo '<script> window.location.href = "blogs.php"; </script>';

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}