<?php
session_start();
include 'config/database.php';
// if (!isset($_SESSION['uid'])){
//     include_once 'header.php';
//     $sql = "SELECT * FROM images WHERE imagename='cheesey'";
//     $okay = $connection->prepare($sql);
//     $okay->execute();
//     $result = $okay->fetchAll();
//     //$likes = $_POST['likes'];
//     // print_r($result);

//     // echo $likes;
//     $_SESSION['uid'] = $uid;
//     // $comment = $_POST['comment'];


//     foreach ($result as $fat=>$value)  {
//         $likes = $value['likes'];
//         $comment = $value['comments'];
//         $id = $value['id'];
//         echo '<img src="'. $value['image'] .'"/>';
//         echo "\n";
//     }
//     exit();
// }

?>

<?php
session_start();
include_once 'loggedin.php';

    $sql = "SELECT * FROM images WHERE imagename='cheesey'";
    $okay = $connection->prepare($sql);
    $okay->execute();
    $result = $okay->fetchAll();
    //$likes = $_POST['likes'];
    // print_r($result);

    // echo $likes;
    $_SESSION['uid'] = $uid;
    // $comment = $_POST['comment'];

try{
    foreach ($result as $fat=>$value)  {
        $likes = $value['likes'];
        $comment = $value['comments'];
        $id = $value['id'];
        /*if (isset($_GET['page'])){
            $page = $_GET['page'];
          }
          else $page = 1;
          if ($fat <= ($page * 5) - 1 && $fat >= ($page * 5 - 5)){*/
        echo '<img src="'. $value['image'] .'"/>';
        echo "\n";
        echo "<form action='gallery.php' method='POST'>
                <button name='like' value=$id>Like($likes)</button>
                <button name='delete'>Delete</button>
                <input type='hidden' name=$uid>
                <textarea name='comment'></textarea>
                <button type='submit' name='submitcom' value=$id>Comment</button>
                $comment
                </form>";
          }
    }
    /*echo '
    <li><a href="gallery.php?page=1">1</a></li>
    <li><a href="gallery.php?page=2">2</a></li>
    <li><a href="gallery.php?page=3">3</a></li>
    <li><a href="gallery.php?page=4">4</a></li>
    <li><a href="gallery.php?page=5">5</a></li>';
}*/
catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
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
        $id = $_POST['submitcom'];
        $query = "SELECT * FROM images WHERE id=$id";
        $yes = $connection->prepare($query);
        $yes->execute();
        $result = $yes->fetch(PDO::FETCH_ASSOC);
        $id = $result['id'];
        $image = $result['image'];
        $comment = $_POST['comment'];
        $yeah = "UPDATE `images` SET comments='$comment' WHERE id='$id'";
        $hello = $connection->prepare($yeah);
        $hello->execute();

        $sql = "SELECT * FROM users WHERE email='iancalvert0@gmail.com'";
        $hey = $connection->prepare($sql);
        $hey->execute();
        $res = $hey->fetch(PDO::FETCH_ASSOC);
        $email = $res['email'];

        $from = "camagru@gmail.com";
        $subject = "Comments";
        $message = "Someone has commented '$comment' on your post";
        $headers = "From:" . $from;
        mail($email,$subject,$message, $headers);

        header("Location: gallery.php");
    }
?>