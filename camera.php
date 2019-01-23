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
        <div>
        <form action="cam_save.php" method="POST"  id="form">
            <input type="submit" value="Save" name="save"/>
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
                alert("Hardware not available");
            }
            document.getElementById('capture').addEventListener('click', function() {
            context.drawImage(video, 0, 0, 400, 300);
            photo.setAttribute('src', canvas.toDataURL('image/png'));
            });

         </script>
         <script>
            document.getElementById('form').addEventListener('submit', function(e) {
                e.preventDefault();
	        var canvas = document.getElementById("canvas");
	        var dataUrl = canvas.toDataURL("image/png");

        	var json = {
		    image: dataUrl
	}

	        var xhr = new XMLHttpRequest();
	        xhr.open('POST', 'cam_save.php', true);
              xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        	xhr.onreadystatechange = function(data) {
    		    if (xhr.readyState == 4 && xhr.status == 200) {
			        console.log(this.responseText);
        	    }
        	}
    var params = "image="+dataUrl;
    xhr.send(params);

});
         </script>
    </body>
</html>

