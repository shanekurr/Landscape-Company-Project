<?php

require('connect.php');

$sql = "INSERT INTO Customers (Name, Address, PIN, PlantTrim, LeafTrash, DeadPlant, WeedSpray) 
		VALUES (\"Jon Kurr\" , \"7625 Golden Ave\" , \"123456\" , 0 , 1 , 1 , 0 )";
//echo $sql;
if (mysqli_query($conn, $sql)){
	echo "SUCCESS!";
} else {
	echo "ERROR!";
}
?>