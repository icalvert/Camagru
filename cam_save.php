
<?php
  session_start();
  require_once 'config/database.php';
if(isset($_POST['save'])){
  $image = $_POST['image'];
  $uid = $_SESSION['uid'];
  $imagename = "cheesey";

  $sql = "INSERT INTO images(username, imagename, image) VALUES ('$uid', '$imagename', '$image')";
   $connection->exec($sql);

  echo "<script>history.back();</script>;";
}
?>