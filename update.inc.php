<?php
session_start();
if (isset($_POST['update'])){
    include_once 'config/database.php';
    header("Location: update.php");
}
?>