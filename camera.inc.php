<?php
session_start();
if (isset($_POST['editing'])){
    include_once 'config/database.php';
    header("Location: camera.php");
}
?>