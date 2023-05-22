<?php

$dbname = 'id20432339_ustp_apm';
$dbuser = 'id20432339_ustpapm';  
$dbpass = 'IJDOq_)9d2m]74-)'; 
$dbhost = 'localhost'; 

$connect = @mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$connect){
	echo "Error: " . mysqli_connect_error();
	exit();
}

echo "Connection Success!<br><br>";

// Define the start and end timestamps for the 8-hour range
$start_timestamp = strtotime('-8 hours');
$end_timestamp = time();

// Write the SQL query to calculate the average value
$sql = "SELECT PM2_5 AS PM2_5 FROM sensor_data WHERE timestamp BETWEEN '$start_timestamp' AND '$end_timestamp'";

// Execute the SQL query and retrieve the result
$result = $connect->query($sql);

 
// Check if the query executed successfully
if (!$result) {
    die("Query failed: " . $connect->error);
}

$row = $result->fetch_assoc();
$PM2_5 = $row['PM2_5'];

// Display the average value to the user or store it in a variable for further processing
echo $PM2_5;
?>

<!DOCTYPE html>
<HTML>
<meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet"
    />
<title> Contact</title> 
<body>
  <h1>
  "The average value for the last 8 hours is: <?php echo $PM2_5?>" 
  </h1>
</body>
</HTML>