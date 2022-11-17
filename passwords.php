<?php
if(!@include('./secrets.php'));

// "name" and "pass" is a default value if secrets.php removed !
$mysql_username = $mysql_username_secret ?: "name";
$mysql_password = $mysql_password_secret ?: "pass";

$mqtt_connect_name = $mqtt_connect_name ?: "'name'";
$mqtt_connect_pass = $mqtt_connect_pass ?: "'pass'";
