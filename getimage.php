<?php
session_start();
include_once 'header.php';
?>

<?php

    $sql = "SELECT image FROM images";
    $okay = $connection->prepare($sql);
    //$yeah = $okay->rowCount();

    
    while($result = $okay->fetch(PDO::FETCH_ASSOC))
    {
        $imageData = $row['image'];
    }
    header("content-type:image/png");
    echo $imagedata;
  
?>