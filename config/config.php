<?php
	$sql = "CREATE DATABASE IF NOT EXISTS camagru";
    $connection->exec($sql);

    $sql = "USE camagru";
    $connection->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username varchar(100) NOT NULL,
        email varchar(255) NOT NULL,
        password varchar(255) NOT NULL,
        verified INT,
        token varchar(32) NOT NULL,
        reset varchar(32) NOT NULL,
        enotification INT
    )";
    $connection->exec($sql);
?>