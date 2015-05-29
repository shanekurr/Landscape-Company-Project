<?php
$customer=$_POST['customer'];
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



$sql = "INSERT INTO Jobs (AccountNum, PlantTrim, LeafTrash, DeadPlant, WeedSpray, DateAdded) 
		VALUES ( $customer , $trimservice , $trashservice , $deadplant , $weedspray, CURDATE() )";
if (mysqli_query($conn, $sql)){
	header("Location: admin.php");
} else {
	echo "ERROR!";
}
?>