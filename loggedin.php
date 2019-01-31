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
    