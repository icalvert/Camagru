<?php
session_start();
    require_once "config/database.php";
        
    $email = $_GET['email'];
    $token = $_GET['token'];

    $query = "SELECT email, verified, token from users WHERE email='$email' AND token='$token'";
    $okay = $connection->prepare($query);
    $okay->execute();
    $yeah = $okay->rowCount();
    if($okay > 0){
        $sql = $connection->prepare("UPDATE `users` SET verified=1 WHERE email='$email' AND token='$token'");
        $sql->execute();
        header("Location:index.php");
    } else {
        echo "You are not authorised to access this site.";
    }



    
    
    
?>