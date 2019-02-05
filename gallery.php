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
//$likes = $_POST['likes'];
$likes = $result['likes'];
$_SESSION['uid'] = $uid;

foreach ($result as $fat=>$value)  {

    echo '<img src="'. $value['image'] .'"/>';
    echo "\n";
    echo "<form action='gallery.php' method='POST'>
            <button name='like'>Like($likes)</button>
            <button name='delete'>Delete</button>
            <input type='hidden' name=$uid>
            <textarea name='comment'></textarea>
            <button type='submit' name='submitcom'>Comment</button>
            </form>";
}

if (isset($_POST['like'])) {
    $query = "SELECT * FROM images WHERE imagename='cheesey'";
    $okay = $connection->prepare($query);
    $okay->execute();
    $result = $okay->fetch(PDO::FETCH_ASSOC);
    $image = $result['image'];
    $sqlquery = "UPDATE `images` SET likes='$likes+1' WHERE image='$image'";
    //print_r($result['likes']);

    $yes = $connection->prepare($sqlquery);
    $yes->execute();
    header("Refresh:10");
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