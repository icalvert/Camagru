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
$likecount = "0";
$_SESSION['uid'] = $uid;

foreach ($result as $fat=>$value)  {

    echo '<img src="'. $value['image'] .'"/>';
    echo "\n";
    echo "<form action='gallery.php' method='POST'>
            <button name='like'>Like($likecount)</button>
            <button name='delete'>Delete</button>
            <input type='hidden' name=$uid>
            <textarea name='comment'></textarea>
            <button type='submit' name='submitcom'>Comment</button>
            </form>";
}

if (isset($_POST['like'])) {
    $likecount++;
}

if (isset($_POST['delete'])) {
    $query = "SELECT * FROM images WHERE imagename='cheesey'";
    $okay = $connection->prepare($query);
    $okay->execute();
    $result = $okay->fetch(PDO::FETCH_ASSOC);
    $image = $result['image'];
    $sql = "DELETE FROM images where image='$image'";
    $yes = $connection->prepare($sql);
    $yes->execute();
    header("Refresh:10");
}

?>