<?php
/**
 * Created by PhpStorm.
 * User: markgrover
 * Date: 1/14/20
 * Time: 1:07 PM
 */
include_once 'db_connection.php';

$isValid = true;
$errors = [];

if(!str_ireplace(' ', '', $_POST['name'])){
    array_push($errors, 'Name field must be filled in ');
    $isValid = false;
}
if(!str_ireplace(' ', '', $_POST['email'])){
    array_push($errors,'Email field must be filled in ');
    $isValid = false;
}
if(!str_ireplace(' ', '', $_POST['phone'])){
    array_push($errors,'Phone field must be filled in ');
    $isValid = false;
}
if(!str_ireplace(' ', '', $_POST['comment'])){
    array_push($errors, 'Comment field must be filled in ');
    $isValid = false;
}

if($isValid){
    $name = htmlspecialchars($_POST['name']);;
    $email = htmlspecialchars($_POST['email']);;
    $phone = htmlspecialchars($_POST['phone']);;
    $comment = htmlspecialchars($_POST['comment']);;

    $data = [$name, $email, $phone, $comment];

    $sql = "INSERT INTO messages (name, email, phone, comment) VALUES (?,?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$name, $email, $phone, $comment]);

// send email
// the message
    $msg = $name . " Sent you a message\nTheir email is " . $email. "\nTheir Phone number is ". $phone . "\n $comment";

// use wordwrap() if lines are longer than 70 characters
//$msg = wordwrap($msg,70);
    $headers = 'From: markagrover@mawebdesignsolutions.com' . "\r\n" . 'Reply-To:' . $email;

// send email
    mail("markagrover85@gmail.com","New Client Alert",$msg,$headers);
    mail($email,"Thank you for contacting us."," Someone will be in touch with you shortly. We appreciate your patience",$headers);

} else {
    foreach($errors as $error){
        echo $error . '<br>';
    }
}
