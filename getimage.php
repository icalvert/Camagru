<?php
session_start();
include_once 'header.php';
?>

<?php

    $sql = "SELECT * from images WHERE imagename='cheesey'";
    $okay = $connection->prepare($sql);
    while($result = $okay->fetch(PDO::FETCH_ASSOC))
    {
        $imageData = $row['image'];
    }
    header("content-type:image/png");
    echo $imagedata;
?>