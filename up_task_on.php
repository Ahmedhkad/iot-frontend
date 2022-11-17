<?php
require('vendor/autoload.php');
//update_task.php ON!
include('database_connection.php');

if($_POST["task_id"])
    {
      $taskid = $_POST["task_id"];
         $data = array(
          ':task_status'  => 'ON',
          ':task_id'  => $_POST["task_id"]
         );
         $query = "
         UPDATE lights
         SET task_status = :task_status
         WHERE task_id = :task_id
         ";
         $statement = $connect->prepare($query);
         if($statement->execute($data))
         {
          $server = '192.168.1.199';     // change if necessary
          $port = 21883;                     // change if necessary
          $username = '';                   // set your username
          $password = '';                   // set your password
          $client_id = 'phpMQTT-iot-dashboard-pub-on'; // make sure this is unique for connecting to sever - you could use uniqid()
          
          
          $mqtt = new Bluerhinos\phpMQTT($server, $port, $client_id);
          if ($mqtt->connect(true, NULL, $username, $password)) {
            $mqtt->publish('onTopic', $taskid, 0, false);
            $mqtt->close();
          } else {
              echo "Time out!\n";
          }
         }

         $data2 = array(
          ':task_status'  => 'ON',
          ':task_details' => $_POST["details_e"],
          ':task_id'  => $_POST["task_id"]
         );
         $query2 = "
         INSERT INTO iot_history
         (task_id, task_details, task_status)
         VALUES (:task_id, :task_details, :task_status)
         ";
         $statement2 = $connect->prepare($query2);
         if($statement2->execute($data2))
         {
           echo 'iot copied as sataus=on';
         }
    }
?>
