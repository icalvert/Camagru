<?php
session_start();
include_once 'header.php';
require_once 'config/database.php';
?>

<?php


$sql = "SELECT * FROM images WHERE imagename='cheesey'";
$okay = $connection->prepare($sql);
$okay->execute();
$result = $okay->fetchAll();


foreach ($result as $fat=>$value)  {
    echo '<img src="'. $value['image'] .'"/>';
}
echo "<img src='getimage.php'>";



?>