<?php
     include_once 'header.php';
     session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editing</title>

        <link rel="stylesheet" href="styler.css">
    </head>
    </body>

        <div class="booth">
            <video id="video" width="400" height="300" autoplay></video>
            <a href="#" id="capture" class="booth-capture-button">Capture</a>
            <canvas id="canvas" width="400" height="300"></canvas>
            <img id="photo" src="https://www.placecage.com/c/400/300" alt="Photo">
        </div>
            <input onclick="testing()" type="image" src="https://alittlebityummy.com/wp-content/uploads/2015/11/Cheese-And-The-Low-FODMAP-Diet.jpg" name="sticker1" width="100" height="100" id="sticker1">
            <input onclick="testing()" type="image" src="https://s3.amazonaws.com/applegate-assets-production-clone/2018/03/19/15/49/57/67db072a-4f5f-4298-a661-be8e135d0b7f/Cheese.jpg" name="sticker2" width="100" height="100" id="sticker2">
            <input onclick="testing()" type="image" src="https://static.independent.co.uk/s3fs-public/thumbnails/image/2017/08/24/10/istock-531024761.jpg?w968h681" name="sticker3" width="100" height="100" id="sticker3">

        <div>
        <form action="cam_save.php" method="POST"  id="form">
            <input type="hidden" id="hidden" name="image" value="">
            <input type="submit" value="Save" name="save"/>
        </form>
        <form method="POST" enctype="multipart/form-data">
        <br/>
        <input type="file" name="image">
        <br/><br/>
        <input type="submit" name="sumit" value="Upload">
        </form>
        </div>
        <script>
            var canvas;
            var context;
            var video;

            canvas = document.getElementById("canvas");
            context = canvas.getContext('2d');

            video = document.getElementById("video");

        if(navigator.mediaDevices.getUserMedia)
        {
             navigator.mediaDevices.getUserMedia({video: true})
            .then(function(stream)
            {
              video.srcObject = stream;
            })
            .catch(function(error)
            {
              alert("Please allow access to camera feed");
            });
        }
            else
            {
                alert("Camera not available");
            }
            document.getElementById('capture').addEventListener('click', function() {
            context.drawImage(video, 0, 0, 400, 300);
            photo.setAttribute('src', canvas.toDataURL('image/png'));
            var dataUrl = canvas.toDataURL("image/png");
            document.getElementById('hidden').value = dataUrl;
            });
        function testing() {
            context.drawImage(sticker1, 0, 0, 100, 100);
            photo.setAttribute('src', canvas.toDataURL('image/png'));
            var dataUrl = canvas.toDataURL("image/png");
            //document.getElementById('hidden').value = dataUrl;
        }
        </script>

    <?php
    if (isset($_POST['sumit'])) {
      if (getimagesize($_FILES['image']['tmp_name'])== FALSE)
      {
        echo "please select an image";
      }
      else
      {
        $uid = $_SESSION['uid'];
        $imageName = $_FILES['image']['name'];
        $imageData= file_get_contents($_FILES['image']['tmp_name']);
        $image = base64_encode($imageData);
        $imageType = $_FILES['image']['type'];

        if (substr($imageType,0,5) == "image") {
            $query = "INSERT INTO images(username, imagename, image) VALUES ('$uid', '$imageName', '$image')";
            $connection->exec($query);
            echo "Image uploaded";
        }
        }
    }
    ?>
    </body>
</html>

