<?php
session_start();
include_once 'header.php';
require_once 'config/database.php';
?>

<?php


$sql = "SELECT * FROM images WHERE username='icalvert'";
$okay = $connection->prepare($sql);
$okay->execute();
$result = $okay->fetch(PDO::FETCH_ASSOC);

//header("Content-type: image/png");
//echo base64_decode($result);
echo '<img src="data:image/png;base64,'. $result['image'] .'"/>';

print_r ($result['image']);
//echo "<img src='getimage.php'>";


// while($result = $okay->fetch(PDO::FETCH_ASSOC)) {
//     $IDstore = $row['image'];
//     echo "<img src='getimage.php'>";
// }

?>
