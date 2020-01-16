<?php
/**
 * Created by PhpStorm.
 * User: markgrover
 * Date: 1/14/20
 * Time: 1:07 PM
 */
var_dump($_GET);
$name = htmlspecialchars($_GET['name']);;
$email = htmlspecialchars($_GET['email']);;
$phone = htmlspecialchars($_GET['phone']);;
$comment = htmlspecialchars($_GET['comment']);;

$data = [$name, $email, $phone, $comment];

$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=my_website", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

//$sql = "INSERT INTO messages (name, email, phone, comment) VALUES ($name, $email, $phone, $comment)";

$sql = "INSERT INTO messages (name, email, phone, comment) VALUES (?,?,?,?)";
$stmt= $conn->prepare($sql);
$stmt->execute([$name, $email, $phone, $comment]);

// send email
// the message
$msg = $name . " Sent you a message\nTheir email is " . $email. "\nTheir Phone number is ". $phone . "\n $comment";

// use wordwrap() if lines are longer than 70 characters
//$msg = wordwrap($msg,70);
$headers = 'From: webmaster@localhost.com' . "\r\n" . 'Reply-To: webmaster@localhost.com' . 'X-Mailer: PHP/' . phpversion();

// send email
mail("markagrover85@gmail.com","New Client Alert",$msg,$headers);


