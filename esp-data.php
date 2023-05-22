<!DOCTYPE html>
<html><body>
<?php
/*
  Rui Santos
  Complete project details at https://RandomNerdTutorials.com/esp32-esp8266-mysql-database-php/
  
  Permission is hereby granted, free of charge, to any person obtaining a copy
  of this software and associated documentation files.
  
  The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.
*/

$servername = "localhost";

// REPLACE with your Database name
$dbname = "id20432339_ustp_apm";
// REPLACE with Database user
$username = "id20432339_ustpapm";
// REPLACE with Database user password
$password = "IJDOq_)9d2m]74-)";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, PM1, PM2_5, PM10, temperature, humidity, CO_ppm, CO_aqival, 	CO_aqi_status, PM25_aqival, aqi_status, timestamp FROM sensor_data ORDER BY id DESC";

echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        <td>ID</td> 
        <td>PM1</td> 
        <td>PM2_5</td> 
        <td>PM10</td> 
        <td>Temperature</td>
        <td>Humidity</td> 
        <td>CO_ppm</td>
        <td>CO_aqival</td> 
        <td>CO_aqi_status</td>
        <td>PM25_aqival</td>
        <td>aqi_status</td> 
        <td>timestamp</td>
      </tr>';
 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_id = $row["id"];
        $row_PM1 = $row["PM1"];
        $row_PM2_5 = $row["PM2_5"];
        $row_PM10 = $row["PM10"];
        $row_temperature = $row["temperature"]; 
        $row_humidity = $row["humidity"]; 
        $row_CO_ppm = $row["CO_ppm"];
        $row_CO_aqival = $row["CO_aqival"]; 
        $row_CO_aqi_status = $row["CO_aqi_status"];
        $row_PM25_aqival = $row["PM25_aqival"]; 
        $row_aqi_status = $row["aqi_status"]; 
        $row_timestamp = $row["timestamp"];
        // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));
      
        // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));
      
        echo '<tr> 
                <td>' . $row_id . '</td> 
                <td>' . $row_PM1 . '</td> 
                <td>' . $row_PM2_5 . '</td> 
                <td>' . $row_PM10 . '</td> 
                <td>' . $row_temperature . '</td>
                <td>' . $row_humidity . '</td> 
                <td>' . $row_CO_ppm . '</td> 
                <td>' . $row_CO_aqival . '</td> 
                <td>' . $row_CO_aqi_status . '</td> 
                <td>' . $row_PM25_aqival . '</td>
                <td>' . $row_aqi_status . '</td> 
                <td>' . $row_timestamp . '</td>
              </tr>';
    }
    $result->free();
}

$conn->close();
?> 
</table>
</body>
</html>