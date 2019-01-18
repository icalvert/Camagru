<?php

if (isset($_POST['editing'])){
    include_once 'config/database.php';
    header("Location: camera.php");
}
?>