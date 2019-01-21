<?php
session_start();
require_once 'config/database.php';

    $newuid = $_POST['newuid'];
    $pwd = $_POST['pwd'];
    $updatepwd = $_POST['updatepwd'];
    $newemail = $_POST['newemail'];
    $uid = $_SESSION['uid'];

if (isset($_POST['updateuid'])){
    if ($newuid == "" || $pwd == ""){
        echo "fields are empty";
    } else {
        $sql = $connection->prepare("UPDATE `users` SET username='$newuid' WHERE username='$uid' OR  email='$uid'");
        $sql->execute();
        $_SESSION['uid'] = $newuid;
        header("Location:index.php");
    }
}

if (isset($_POST['updatepass'])){
    if ($updatepwd == "" || $pwd == ""){
        echo "fields are empty";
    } else {
        $hashedPass = password_hash($updatepwd, PASSWORD_DEFAULT);
        $sql = $connection->prepare("UPDATE `users` SET password='$hashedPass' WHERE username='$uid' OR  email='$uid'");
        $sql->execute();
        header("Location:index.php");
    }
}

if (isset($_POST['updateemail'])){
    if ($newemail == "" || $pwd == ""){
        echo "fields are empty";
    } else {
        $sql = $connection->prepare("UPDATE `users` SET email='$newemail' WHERE username='$uid' OR  email='$uid'");
        $sql->execute();
        $_SESSION['uid'] = $newuid;
        header("Location:index.php");
    }
}

if (isset($_POST['noti']) && isset($_POST['save_changes']))
{
    $email_notification = 1;
    $_SESSION['email_notification'] = $email_notification;
    echo "<script> alert ('email notifications switched on'); </script>";
    header("refresh: 0.05; url=index.php");

    
}
?>