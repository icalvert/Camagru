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
// print_r($result);

// echo $likes;
$_SESSION['uid'] = $uid;
$comment = $_POST['comment'];


foreach ($result as $fat=>$value)  {
    $likes = $value['likes'];
    $id = $value['id'];
    echo $id;
    echo '<img src="'. $value['image'] .'"/>';
    echo "\n";
    echo "<form action='gallery.php' method='POST'>
            <button name='like' value=$id>Like($likes)</button>
            <button name='delete'>Delete</button>
            <input type='hidden' name=$uid>
            <textarea name='comment' value=$id></textarea>
            <button type='submit' name='submitcom'>Comment</button>
            </form>";
   echo $comment;
}

if (isset($_POST['like'])) {
    // print_r($_POST);
    $id = $_POST['like'];
    $query = "SELECT * FROM images WHERE id=$id";
    $okay = $connection->prepare($query);
    $okay->execute();
    $result = $okay->fetch(PDO::FETCH_ASSOC);
    // print_r($result);
    $id = $result['id'];
    $image = $result['image'];
    $likes = $result['likes'];
    $sqlquery = "UPDATE `images` SET likes=likes+1 WHERE id='$id' OR image='$image'";
    //print_r($result['likes']);
    // echo $sqlquery;
    $yes = $connection->prepare($sqlquery);
    $yes->execute();
    header("Location: gallery.php");
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

if (isset($_POST['submitcom'])) {
    $query = "SELECT * FROM images WHERE id=$id";
    $yes = $connection->prepare($query);
    $yes->execute();
    $result = $yes->fetch(PDO::FETCH_ASSOC);
    $id = $result['id'];
    $image = $result['image'];
    $comment = $_POST['comment'];
    $yeah = "UPDATE `images` SET comments='$comment' WHERE image='$image'";
    $hello = $connection->prepare($yeah);
    $hello->execute();
    print_r($comment);
}


?>