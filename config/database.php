<?php

$host   = 'localhost';
$user   = 'root';
$pass   = '123456';
$dbname = 'camanew';

try
{
    $connection = new PDO("mysql:host=$host", $user, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    include_once("config.php");
}
catch (PDOException $e)
{
    echo $e->getMessage();
}

?>