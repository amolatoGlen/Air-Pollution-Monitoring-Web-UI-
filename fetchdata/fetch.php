<?php
//for localhost computer
/**$hostName = "localhost";
$userName = "id20432339_ustpapm";
$password = "";
$databaseName = "esp32_mc_db";
**/

//For 000.webhost.com
$hostName = "localhost";
$userName = "id20432339_ustpapm";
$password = "IJDOq_)9d2m]74-)";
$databaseName = "id20432339_ustp_apm";


$con = mysqli_connect($hostName, $userName, $password, $databaseName);
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
?>
