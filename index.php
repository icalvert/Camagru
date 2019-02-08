<?php
session_start();
require_once 'config/database.php';
?>

<?php

    $verified = $_POST['verified'];

    $query = "SELECT verified from users WHERE verified='$verified'";
    $okay = $connection->prepare($query);
    $okay->execute();
    $yeah = $okay->rowCount();
    if($_SESSION['uid']){
        include_once 'loggedin.php';
        echo '<section class="main-container">
        <div class="main-wrapper">
            <h2>Camagru</h2>
                    <form action="camera.inc.php" method="POST">
                    <button type="submit" name="editing">Editing</button>
                    </form>
                    <br>
                    <form action="update.inc.php" method="POST">
                    <button type="submit" name="update">Update profile</button>
                    </form>
                    <br>
                    <form action="gallery.php" method="POST">
                    <button type="submit" name="gallery">Gallery</button>
                    </form>
        </div>
    </section>';
    }
?>

<?php
    include_once 'footer.php';
?>
