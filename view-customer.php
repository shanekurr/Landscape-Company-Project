<?php 

require( 'connect.php' );
ini_set('display_errors',1);
error_reporting(E_ALL);
$customerID=$_POST['customer'];

$sql= "SELECT `Customers`.`AccountNum`, `Customers`.`Name` , `Customers`.`Address` ,
				`Jobs`.`JobNum` , `Jobs`.`Verified` , `Jobs`.`DateAdded` , `Jobs`.`CheckIn` ,
				`Jobs`.`CheckOut`
				FROM `Customers`
				INNER JOIN `Jobs`
				ON `Customers`.`AccountNum`=`Jobs`.`AccountNum`
				WHERE `Customers`.`AccountNum`=$customerID";
$result = mysqli_query($conn, $sql);

$jobs=mysqli_fetch_array($result,MYSQLI_ASSOC);

foreach($result as $job):
	echo $job['JobNum'];
endforeach;

?>

