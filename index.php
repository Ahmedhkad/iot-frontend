<?php
//index.php
include('database_connection.php');
$query = "
 SELECT * FROM lights
";
$statement = $connect->prepare($query);
$statement->execute();
$resultLight = $statement->fetchAll();

$query2 = "
 SELECT * FROM sensors
";
$statement2 = $connect->prepare($query2);
$statement2->execute();
$resultSensor = $statement2->fetchAll();
?>

<?php include('inc/header.php'); ?>

<body>

   <div class="containera">
     <section id="home">
       <h1>Welcome To My Dashboard</h1>
       <p class="lead">Frontend : Using HTML, PHP, CSS, Javascript</p>
       <p class="lead">Backend : Using Apache2 server, AJAX, PHP, MySQL database </p>
       <p class="lead">Backend Methods/Libraries: PDO on MySQL // jQuery on AJAX   </p>
     </section>

              <section id="lights">
                  <div class="section-container">
                    <div class="container-title">
                      <h2>Lights <i class="far fa-lightbulb"></i></h2>
                    </div>
                  <?php foreach($resultLight as $row) : ?>
                        <div class="<?php echo $row['task_status']; ?>" id="device-<?php echo $row['task_id']; ?>" data-id="<?php echo $row['task_id']; ?>" data-details-id="<?php echo $row['task_details']; ?>" >

                            <span class="device-name-<?php echo $row['task_details']; ?>"><?php echo $row['task_details']; ?></span>
                            <p class="state-<?php echo $row['task_id']; ?>"><?php echo $row['task_status']; ?></p>
                        </div>
                  <?php endforeach; ?>
                  </div>
              </section>

              <section id="sensors">
                  <div class="section-container">
                    <div class="container-title">
                      <h2>Sensors <i class="fas fa-temperature-high"></i></h2>
                    </div>
                  <?php foreach($resultSensor as $rows) : ?>
                        <div class="sens" id="sensor-<?php echo $rows['task_id']; ?>"  >
                            <h2><i class="<?php echo $rows['sensor_type']; ?>"></i></h2>
                            <span class="sensor-name"><?php echo $rows['task_details']; ?></span>
                            <p class="sensid-<?php echo $rows['task_id']; ?>"><?php echo $rows['task_value']; ?></p>
                        </div>
                  <?php endforeach; ?>

                  <div class="sens" id="sensor-8"  >
                            <h2><i class="fas fa-gamepad"></i></h2>
                            <input type="submit" class="btn-once button-ctl" name="Get once" value="Get once" />
                            <input type="submit" class="btn-repeat button-ctl" name="Repeating request" value="Repeating request" />
                  </div>


           
              </section>



    </div>

<?php include('inc/footer.php'); ?>
