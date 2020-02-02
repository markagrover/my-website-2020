<?php
/**
 * Created by PhpStorm.
 * User: markgrover
 * Date: 1/22/20
 * Time: 8:26 PM
 */
include_once 'db_connection.php';
$id = $_GET['id'];
$sql = "DELETE FROM messages WHERE id ='$id'";
$stmt= $conn->prepare($sql);
$stmt->execute();
echo '<script> window.location.href = "admin.php"</script>';
