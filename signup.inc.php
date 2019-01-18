<?php

if (isset($_POST['submit'])){
    require_once 'config/database.php';

    $uid = $_POST['uid'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    $sql = "SELECT email from users WHERE email='$email'";
    $okay = $connection->prepare($sql);
    $okay->execute();
    $yeah = $okay->rowCount();


    if ($_POST['uid'] == "" || $_POST['email'] == "" || $_POST['pwd'] == "")
    {
        header("Location:signup.php");
    } elseif($yeah > 0) {
        echo "username already exists";
    }
    
    if(strlen($pwd) < 5)
        echo "Password must have at least 5 characters\n";
    if (!preg_match("#[0-9]+#",$pwd))
        echo "Password must have at least 1 number\n";
    if (!preg_match("#[a-z]+#",$pwd))
        echo "Password must have at least 1 lowercase letter\n";
    if (!preg_match("#[A-Z]+#",$pwd))
        echo "Password must contain at least 1 uppercase letter\n";

    else {
        try {
            $connection->beginTransaction();

            $token = md5(rand(0,1000));
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users(username, email, password, verified, token, reset) VALUES ('$uid', '$email', '$hashedPwd', 0, '$token', '0')";
            $connection->exec($sql);

            $from = "camagru@gmail.com";
            $subject = "Account confirmation";
            $message = "Please click on this link to confirm your account http://localhost:8080/camanew/verified.php?email=$email&token=$token";
            $headers = "From:" . $from;
            mail($email,$subject,$message, $headers);
            echo "The email message was sent.";

            $connection->commit();

        }
        catch(PDOException $e)
        {
            echo $sql . "\n" . $e->getMessage();
        }
    }
}

if (isset($_POST['resetbtn'])){
    require_once 'config/database.php';

    $uid = $_POST['uid'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    
    $sql = "SELECT email from users WHERE email='$email'";
    $okay = $connection->prepare($sql);
    $okay->execute();
    $yeah = $okay->rowCount();


    if ($_POST['uid'] == "" || $_POST['email'] == "")
    {
        header("Location:signup.php");
    } elseif($yeah > 0) {
        try {
            $connection->beginTransaction();

            $reset = md5(rand(0,1000));
            $query = "UPDATE `users` SET reset='$reset' WHERE email='$email'";
            $why = $connection->prepare($query);
            $why->execute();

            $from = "camagru@gmail.com";
            $subject = "Reset Password";
            $message = "Please click on this link to reset your password http://localhost:8080/camanew/reset.php?email=$email&reset=$reset";
            $headers = "From:" . $from;
            mail($email,$subject,$message, $headers);
            echo "The email message was sent.";

            $connection->commit();

        }
        catch(PDOException $e)
        {
            echo $sql . "\n" . $e->getMessage();
        }
    } else {
        echo "User not in database";
    }

}

?>