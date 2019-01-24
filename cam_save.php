
<?php
  session_start();
  require_once 'config/database.php';
if(isset($_POST['save'])){
  $image = $_POST['image'];
  $uid = $_SESSION['uid'];

  $sql = "INSERT INTO images(username, image) VALUES ('$uid', '$image')";
   $connection->exec($sql);

  echo "<script>history.back();</script>;";
}
?>