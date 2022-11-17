<?php
//database connection
include('passwords.php');

$serverName = 'iot-dashboard-mysql';    
$databaseName = 'db';
$serverPort = '3306';
$username = $mysql_username;
$password = $mysql_username;

if (class_exists('PDO')) {
 
    try {
        $connect = new PDO("mysql:host=" . $serverName . ";dbname=" . $databaseName . ";port=" . $serverPort, $username, $password);
    } catch (PDOException $e) {
        echo nl2br("check mysql username and password in ( secrets.php ) \n");
        echo 'Connection failed: ' . $e->getMessage();
    }
};
 
?>