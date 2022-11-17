<?php

require('vendor/autoload.php');


if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'once':
            repeat();
            break;
        case 'repeat':
            repeat();
            break;
    }
}


function repeat() {
    
    $server = '192.168.1.199';     // change if necessary
    $port = 21883;                     // change if necessary
    $username = '';                   // set your username
    $password = '';                   // set your password
    $client_id = 'phpMQTT-iot-dashboard-repeat'; // make sure this is unique for connecting to sever - you could use uniqid()
    
     
    $mqtt = new Bluerhinos\phpMQTT($server, $port, $client_id);
    if(!$mqtt->connect(true, NULL, $username, $password)) {
        exit(1);
    }
    
    $mymsg = $mqtt->subscribeAndWaitForMessage('nodeTopic', 0);
    // echo $mymsg;
    $obj = json_decode($mymsg); //as object $obj->{'a'}
    $objarray = json_decode($mymsg, true); // as Array $objarray['a']
    
    $mqtt->close();
    echo $mymsg;
    
    exit;
}

