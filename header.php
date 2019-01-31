<?php
session_start();
include_once 'config/database.php';

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
                    <?php
                        if (isset($_SESSION['u_id'])) {
                          echo '<form action="logout.inc.php" method="POST">
                                <button type="submit" name="submit">Logout</button>
                          </form>';
                        } else {
                            echo '<form action="login.inc.php" method="POST">
                                    <input type="text" name="uid" placeholder="Username/Email">
                                    <input type="password" name="pwd" placeholder="Password">
                                    <button type="submit" name="submit">Login</button>
                                    </form>
                                    <a href="signup.php">Sign up</a>';
                        }

                    ?>
                </div> 
            </div>
        </nav>
        <br>
        <br>
        <br>
        <form action="gallery.php" method="POST">
    <button type="submit" name="gallery">Gallery</button>
    </form>
    </header>

    