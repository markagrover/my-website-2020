<?php
/**
 * Created by PhpStorm.
 * User: markgrover
 * Date: 1/22/20
 * Time: 1:19 PM
 */
$servername = "localhost";
$username = "root";
$password = "root";
$db = 'my_website';
//$servername = "localhost";
//$username = "markagro_user";
//$password = "magjls2010";
//$db = "markagro_my-website";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}