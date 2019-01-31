<?php
session_start();
include_once 'header.php';
require_once 'config/database.php';
?>

<?php


$sql = "SELECT image from images WHERE imagename='cheesey'";
$okay = $connection->prepare($sql);
$okay->execute();

while($result = $okay->fetch(PDO::FETCH_ASSOC)) {
    $IDstore = $row['image'];
    echo "<img src='getImage.php'>";
}

?>
