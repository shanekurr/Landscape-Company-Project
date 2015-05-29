<?php 

require( 'connect.php' );
ini_set('display_errors',1);
error_reporting(E_ALL);
$jobID=$_POST['job'];

$sql= "SELECT `Jobs`.`JobNum`, `Customers`.`Name` , `Customers`.`Address` ,
				`Jobs`.`DateAdded` , `Jobs`.`CheckIn` ,	`Jobs`.`CheckOut` ,
				`Jobs`.`Verified` , `Jobs`.`PlantTrim` , `Jobs`.`LeafTrash` ,
				`Jobs`.`DeadPlant` , `Jobs`.`WeedSpray`
				FROM `Jobs`
				INNER JOIN `Customers`
				ON `Jobs`.`AccountNum`=`Customers`.`AccountNum`
				WHERE `Jobs`.`JobNum`=$jobID";
$result = mysqli_query($conn, $sql);

$jobs=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<html>
<table style="border=1px;">
<tr>
	<td>Job Number</td>
	<td>Date Created</td>
	<td>Address</td>
	<td>Check In Time</td>
	<td>Check Out Time</td>
	<td>Verified</td>
	<td>Plant Trimming</td>
	<td>Trash Pick Up</td>
	<td>Plant Replacement</td>
	<td>Weed Spraying</td>
</tr>
<?php
foreach($result as $job):
	echo "<tr>";
	echo "<td>" . $job['JobNum'] . "</td>";
	echo "<td>" . $job['DateAdded'] . "</td>";
	echo "<td>" . $job['Address'] . "</td>";
	echo "<td>" . $job['CheckIn'] . "</td>";
	echo "<td>" . $job['CheckOut'] . "</td>";
	echo "<td>" . $job['Verified'] . "</td>";
	echo "<td>" . $job['PlantTrim'] . "</td>";
	echo "<td>" . $job['LeafTrash'] . "</td>";
	echo "<td>" . $job['DeadPlant'] . "</td>";
	echo "<td>" . $job['WeedSpray'] . "</td>";
	echo "</tr>";
endforeach;
?>
</table>
</html>
<?php
?>

