<?php
session_start();
if (isset($_POST['submit'])) {

require_once "config/database.php";

    $uid = $_POST['uid'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    $sql = "SELECT * FROM users WHERE username='$uid' OR  email='$uid'";
    $okay = $connection->prepare($sql);
    $okay->execute();
    $yeah = $okay->rowCount();

    if ($_POST['uid'] == "" || $_POST['pwd'] == "")
    {
        echo "Fields are empty";
    } elseif($yeah > 0) {
        $_SESSION['uid'] = $uid;
        header("Location:index.php");
        } else {
            echo "Username/Password not valid";
        }
}

?>