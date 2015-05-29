<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "PLSdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO Jobs (AccountNum, PlantTrim, LeafTrash, DeadPlant, WeedSpray) 
		VALUES ( 2 , 0 , 1 , 1 , 0 )";
//echo $sql;
if (mysqli_query($conn, $sql)){
	echo "SUCCESS!";
} else {
	echo "ERROR!";
}
?>