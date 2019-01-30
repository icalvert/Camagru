<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>

    <header>
        <nav>
            <div class="main-wrapper">
                <ul>
                    <li><a href="index.php">Camagru</a><li>
                </ul>
                <div class="nav-login">
                        
                          <form action="logout.inc.php" method="POST">
                                <button type="submit" name="logout">Logout</button>
                          </form>
                </div> 
            </div>
        </nav>
    </header>



<?php

require_once 'config/database.php';
    $verified = $_POST['verified'];

    $query = "SELECT verified from users WHERE verified='$verified'";
    $okay = $connection->prepare($query);
    $okay->execute();
    $yeah = $okay->rowCount();
    if($yeah > 0){
        echo '<form action="camera.inc.php" method="POST">
        <button type="submit" name="editing">Editing</button>
        </form>';
    }

?>
<section class="main-container">
    <div class="main-wrapper">
        <h2>Camagru</h2>
                <form action="camera.inc.php" method="POST">
                <button type="submit" name="editing">Editing</button>
                </form>
                <br>
                <form action="update.inc.php" method="POST">
                <button type="submit" name="update">Update profile</button>
                </form>
    </div>
</section>
<?php
    include_once 'footer.php';
?>
