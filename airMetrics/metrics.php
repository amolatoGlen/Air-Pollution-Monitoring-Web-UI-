<?php 

    require_once("../fetchdata/fetch.php");
    $query = " select * from sensor_data ";
    $result = mysqli_query($con,$query);

?>
<!doctype html>
<html> 
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet"
    />
<title> Metrics</title> 
<link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'><link rel="stylesheet" href="./trial.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <input type="checkbox" id="check">
    <header>
      </div>
      <div class="navigation">
        <a href="../index.html">Home</a>
        <a href="../aboutpage/about.html">About</a>
        <a href="../infopage/info.html">Info</a>
        <a href="../contactpage/contact.html">Contact</a>
      </div>
      <div class="logo">
          <img src="../logo.png" alt="logo" style="width:80px;height:70px;">
        </div>
      <label for="check">
      <i class="fas fa-bars menu-btn"></i>
      <i class="fas fa-times close-btn"></i>
      </label>
    </header>
	<section id="s-team" class="section">
		<div class="b-skills">  
    <?php 
      while($row=mysqli_fetch_assoc($result))
            {
                $id = $row['id'];
                $temp = $row['temperature'];
                $hum = $row['humidity'];
                $pm1 = $row['PM1'];
                $pm25 = $row['PM2_5'];
                $pm10 = $row['PM10'];
                $PM25_aqival = $row['PM25_aqival'];
                $CO_ppm = $row['CO_ppm'];
                $aqi_status = $row['aqi_status'];
                $timestamp = $row['timestamp'];
                $CO_aqival=$row['CO_aqival'];
                $CO_aqi_status = $row['CO_aqi_status'];
            }
            $timestamp_formatted = date('Y-m-d H:i:s', strtotime($timestamp) + 8*60*60); // add 8 hours to timestamp
            ?>
            
      <h1>Air Pollution Monitoring System</h1>
      <h2>Dashboard</h2>
      <div class="container">
      <div class="display-date">
        <span id="day">day</span>
        <span id="daynum">00</span>
        <span id="month">month</span>
        <span id="year">0000</span>
      </div>
      </div>
    <div class="display-time"></div>
    <br>
			<div class="container">
				<br><br>
				<div class="row">
          <br>
        <div class="col-xs-12 col-sm-6 col-md-3">
						<div class="skill-item center-block">
							<div class="chart-container">
								<div class="chart " data-percent="<?php echo $temp?>" data-bar-color="#728FCE">
									<span class="percent" data-after="°C">90</span>
								</div>
							</div>

							<p>Temperature</p>
						</div>
					</div>

					<div class="col-xs-12 col-sm-6 col-md-3">
						<div class="skill-item center-block">
							<div class="chart-container">
								<div class="chart " data-percent="<?php echo $hum?>" data-bar-color="#a7d212">
									<span class="percent" data-after="%">78</span>
								</div>
							</div>

							<p>Humidity</p>
						</div>
					</div>

        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="skill-item center-block">
              <div class= "insights">
                <!-- C0 -->
                <div class="pm25">
                  <span class="material-icons-sharp"> air </span>
                  <div class="middle">
                    <div class="left">
                    <br>
                    <h2>Particulate Matter 2.5</h2>
                    <h1><?php echo $pm25?></h1>
                    <h3>µg/m³</h3>
                    </div>
                  </div>
                  <small class="text-muted"> <?php echo $aqi_status?> </small>
              </div>
            </div>
          </div>
				</div>
        <!--Insights or PM2.5 and CO -->
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="skill-item center-block">
              <div class= "insights">
                <!-- C0 -->
                <div class="pm25">
                  <span class="material-icons-sharp"> air </span>
                  <div class="middle">
                    <div class="left">
                    <br>
                    <h2>Carbon Monoxide CO</h2>
                    <h1><?php echo $CO_ppm?></h1>
                    <h3>ppm</h3>
                    </div>
                  </div>
                  <small class="text-muted"> <?php echo $CO_aqi_status?> </small>
              </div>
            </div>
          </div>
				</div>
  
        <!--Insights or PM2.5 and CO -->
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="skill-item center-block">
              
                <!-- status -->
                <div class="pm25">
                  <div class="middle">
                    <div class="left">
                    <br>
                    <h2 style="color: #00008B">DUST status</h2>
                    <h1></h1>
                    <h3 style="color: black"> <?php echo $aqi_status?> </h3>
                    </div>
                  </div>
                  <small class="text-muted"> as of <?php echo $timestamp_formatted?> </small>
              
            </div>
            <!-- status -->
          </div>
				</div>
              <!-- meter aqi status -->
        <!--Insights or PM2.5 and CO -->
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="skill-item center-block">
              
                <!-- status -->
                <div class="pm25">
                  <div class="middle">
                    <div class="left">
                    <br>
                    <h2 style="color: #00008B">GAS status</h2>
                    <h1></h1>
                    <h3 style="color: black"> <?php echo $CO_aqi_status?> </h3>
                    </div>
                  </div>
                  <small class="text-muted"> as of <?php echo $timestamp_formatted?> </small>
              
            </div>
            <!-- status -->
          </div>
				</div>
              <!-- meter aqi status -->
          <!-- ENDInsights or PM2.5 and CO -->
			</div>
		</div>
		
	</section> 
	<br>
	<h5>Last time updated: <?php echo $timestamp_formatted?> </h5>

        <br><br><br>
 <script src="plugins/jquery-2.2.4.min.js"></script>
 <script src="plugins/jquery.appear.min.js"></script>
 <script src="plugins/jquery.easypiechart.min.js"></script> 
 <script src="./air.js"> </script>
 <script src="./date.js"></script>
 <script src="../infopage/aqi.js"></script>
   
</body>
 
</html>
