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

// Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "tPmAT5Ab3j7F9";

$api_key= $PM1 = $PM2_5 = $PM10 = $temperature = $humidity = $CO_ppm = $CO_aqival = $CO_aqi_status = $PM25_aqival = $aqi_status ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $PM1 = test_input($_POST["PM1"]);
        $PM2_5 = test_input($_POST["PM2_5"]);
        $PM10 = test_input($_POST["PM10"]);
        $temperature = test_input($_POST["temperature"]);
        $humidity = test_input($_POST["humidity"]);
        $CO_ppm = test_input($_POST["CO_ppm"]);
        $CO_aqival = test_input($_POST["CO_aqival"]);
        $CO_aqi_status = test_input($_POST["CO_aqi_status"]);
        $PM25_aqival = test_input($_POST["PM25_aqival"]);
        $aqi_status = test_input($_POST["aqi_status"]);
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO sensor_data (PM1, PM2_5, PM10, temperature, humidity, CO_ppm, CO_aqival, 	CO_aqi_status, PM25_aqival, aqi_status) VALUES 
        ('$PM1', '$PM2_5', '$PM10', '$temperature', '$humidity', '$CO_ppm', '$CO_aqival',	'$CO_aqi_status', '$PM25_aqival', '$aqi_status')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}