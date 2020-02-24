<?php
include_once 'db_connection.php';
if(isset($_POST['username'])){
    try {
        if($_POST['password'] != $_POST['passwordConfirm']){
            throw new Exception('Passwords are not the same', 101);
        } else {
            // check to see if username already exist in db
            $username = $_POST['username'];
            $email = $_POST['email'];
            $data = [$username];
            try {
                $sql = "SELECT * FROM users WHERE username = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute($data);
                $result = $stmt->fetchAll();

                $data2 = [$email];
                $sql2 = "SELECT * FROM users WHERE email = ?";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->execute($data2);
                $result2 = $stmt2->fetchAll();
                if($stmt->rowCount() > 0) {
                    throw new Exception('Username Already Taken.', 201);
                } else if ($stmt2->rowCount() > 0) {
                    throw new Exception('Email already exist.', 301);
                } else if (strlen($_POST['password']) < 8) {
                    throw new Exception('Password must be 8 characters long', 401);
                } else {
                    $data = [$email, $_POST['username'], password_hash($_POST['password'], PASSWORD_DEFAULT)];
                    $sql = "INSERT INTO users (email, username, password) VALUES (?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute($data);
                    // send email
                    // the message
                    $msg = $_POST['username'] . " Wants to register with your app.";

                    // use wordwrap() if lines are longer than 70 characters
                    //$msg = wordwrap($msg,70);
                    $headers = 'From: markagrover@mawebdesignsolutions.com';

                    // send email
                    mail("markagrover85@gmail.com","New Registration Alert",$msg,$headers);

//                    echo '<script>
//                        window.location.href = "login.php";
//                    </script>';
                }

            } catch (Exception $e) {
//                echo 'Caught exception', $e->getMessage();
                echo json_encode(array(
                    'error' => array(
                        'msg' => $e->getMessage(),
                        'code' => $e->getCode()
                    ),
                ));
            }

        }
    } catch (Exception $e) {
//        echo 'Caught exception', $e->getMessage();
        echo json_encode(array(
            'error' => array(
                'msg' => $e->getMessage(),
                'code' => $e->getCode()
            ),

        ));

    }
}

