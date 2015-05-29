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
?>
<html>
<table style="border=1px;">
<tr>
	<td>Job Number</td>
	<td>Date Created</td>
	<td>Check In Time</td>
	<td>Check Out Time</td>
	<td>Verified</td>
</tr>
<?php
foreach($result as $job):
	echo "<tr>";
	echo "<td>" . $job['JobNum'] . "</td>";
	echo "<td>" . $job['DateAdded'] . "</td>";
	echo "<td>" . $job['CheckIn'] . "</td>";
	echo "<td>" . $job['CheckOut'] . "</td>";
	echo "<td>" . $job['Verified'] . "</td>";
	echo "</tr>";
endforeach;
?>
</table>
</html>
<?php
?>

