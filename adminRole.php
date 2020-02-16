<?php
/**
 * Created by PhpStorm.
 * User: markgrover
 * Date: 2/15/20
 * Time: 9:39 PM
 */
include_once 'db_connection.php';
try {
    $data = [1, $_GET['id']];
    $sql = "UPDATE users SET role=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);

    echo '<script>window.location.href = "users.php";</script>';
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}