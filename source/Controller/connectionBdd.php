<?php
$host = 'localhost';
$port = 3306;
$dbName = 'twitch';
$user = 'root';
$pass = '';
try {
    $db = new PDO('mysql:host='.$host.';dbname='.$dbName, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (\mysql_xdevapi\Exception $exception) {
    echo 'login failed <br>'.$exception;
}