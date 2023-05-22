<?php 

    require_once("../fetchdata/fetch.php");
    $query = " select * from sensor_data ";
    $result = mysqli_query($con,$query);

?>

<!DOCTYPE html>
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
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
<link rel="stylesheet" href="./aqi.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<?php 
while($row=mysqli_fetch_assoc($result))
  {
    $PM25_aqival = $row['PM25_aqival'];
    $PM25= $row['PM2_5'];
  }
?>
<div style="margin-bottom: 2rem;">
  <input type="range" id="set-aqi" min="0" max="500" value="<?php echo $PM25_aqival ?>">
</div> 
<div class="gauge">
  <div role="meter" aria-valuemin="0" aria-valuemax="500" aria-labelledby="meter-label">
    <div class="dial"><span class="aqi-num"></span><span>AQI</span><div class="arrow"></div></div>
  </div>
  <label class="label" id="meter-label">10 Minute Average US EPA PM2.5 AQI</label>
</div>

<script src="./aqi.js"></script>
</body>
</html>


