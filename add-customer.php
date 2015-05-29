<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
$name=$_POST['name'];
$address=$_POST['address'];
$pin=$_POST['pin'];
if ($_POST['trimservice'] == 'true'){
	$trimservice=1;
} else {
	$trimservice=0;
}
if ($_POST['trashservice'] == 'true'){
	$trashservice=1;
} else {
	$trashservice=0;
}
if ($_POST['deadplant'] == 'true'){
	$deadplant=1;
} else{
	$deadplant=0;
}
if ($_POST['weedspray'] == 'true'){
	$weedspray=1;
} else {
	$weedspray=0;
}

require('connect.php');

$sql = "INSERT INTO Customers (Name, Address, PIN, PlantTrim, LeafTrash, DeadPlant, WeedSpray) 
		VALUES ( \"$name\" , \"$address\" , \"$pin\" , $trimservice , $trashservice , $deadplant , $weedspray )";
if (mysqli_query($conn, $sql)){
	header("Location: admin.php");
} else {
	echo "ERROR!";
}
?>