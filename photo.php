<?php 
session_start();
include_once 'header.php';
require_once 'config/database.php';
?>

<html>
  <body>
    <form method="post" enctype="multipart/form-data">
    <br/>
        <input type="file" name="image" />
        <br/><br/>
        <input type="submit" name="sumit" value="Upload" />
    </form>
    <?php
    if (isset($_POST['sumit'])) {
      if (getimagesize($_FILES['image']['tmp_name'])== FALSE)
      {
        echo "please select an image";
      }
      else
      {
        $image= addslashes($_FILES['image']['tmp_name']);
        $name= addslashes($_FILES['image']['name']);
        $image= file_get_contents($image);
        $image= base64_encode($image);
        saveimage($name,$image);
      }
    }
    function saveImage()
    {
      $query = "INSERT INTO images(name, imagename, image) VALUES ('$name', '$imageName', '$imageData')";
      $yeah = $connection->exec($query);
      if ($yeah) {
        echo "<br/>Image uploaded";
      }
      else
      {
        echo "<br/>Image not uploaded.";
      }
    }
    ?>
  </body>
</html>