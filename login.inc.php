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
    } if ($yeah < 1) {
        header("Location: index.php?login=error");
        exit();
    } else {
        if ($result = $okay->fetch(PDO::FETCH_ASSOC)) {
            $hashedPwdCheck = password_verify($pwd, $result['password']);
            if ($hashedPwdCheck == false) {
                echo "Password is incorrect";
                exit();
            } elseif ($hashedPwdCheck == true) {
                $_SESSION['uid'] = $uid;
                header("Location: index.php");
                exit();
            }
        }
    }
}

?>