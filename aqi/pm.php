<?php 

    require_once("../fetchdata/fetch.php");
    $query = " select * from sensor_data ";
    $result = mysqli_query($con,$query);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air Pollution Monitoring System</title>
    <link rel="stylesheet" href="aqi.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  </head>
  <body>

    <section class="landing_page">
    <?php 
      while($row=mysqli_fetch_assoc($result))
            {
                $pm10 = $row['PM10'];
                $PM25_aqival = $row['PM25_aqival'];
                $CO_ppm = $row['CO_ppm'];
                $timestamp = $row['timestamp'];
            }
            $timestamp_formatted = date('Y-m-d H:i:s', strtotime($timestamp) + 8*60*60); // add 8 hours to timestamp
            ?>
      <input type="checkbox" id="check">
      <header>
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
      <div class="content">
        <div class="info" >
          <h2>Air Pollution <br><span>Monitoring System</span></h2>
          <br>
          <a href="./co.php" class="info-btn">Gas Status</a>
          <a href="./pm.php" class="info-btn">Dust Status</a>
          <a href="../airMetrics/metrics.php" class="info-btn">See Metrics</a>
        </div>
      </div>
      <div class="container">
        <div class="range">
           <h2>Air Quality Index Particulate Matter 2.5</h2>
           
           <br><br><br>
           <div class="range__content">
              <div class="range__slider">
                 <div class="range__slider-line" id="range-line"></div>
              </div>
              
              <div class="range__thumb" id="range-thumb">
                 <div class="range__value">
                    <span class="range__value-number" id="range-number">50</span>
                 </div>
              </div>
  
              <input type="range" 
              class="range__input" 
              id="range-input" 
              min="5" 
              max="500" 
              value="<?php echo $PM25_aqival?>" 
              step="1">
           </div>
           <br>
           <p id="aqi-text">The air quality is currently good.</p>
           
        </div>
     </div>
     <!--=============== MAIN JS ===============-->
      <script src="./aqi.js"></script>
       <!-- <div class="media-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div> -->
    </section>

  </body>
</html>
