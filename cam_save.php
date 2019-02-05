
<?php
  session_start();
  require_once 'config/database.php';
if(isset($_POST['save'])){
  $image = $_POST['image'];
  $uid = $_SESSION['uid'];
  $imagename = "cheesey";

  $sql = "INSERT INTO images(username, imagename, image, likes) VALUES ('$uid', '$imagename', '$image', '0')";
   $connection->exec($sql);

  echo "<script>history.back();</script>;";
}
?>