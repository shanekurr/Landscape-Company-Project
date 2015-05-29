<?php

require( 'connect.php' );

$sql = "SELECT `AccountNum` , `Address` FROM `Customers`";
$customers = mysqli_query($conn, $sql);
$sql2 = "SELECT `Jobs`.`JobNum` , `Customers`.`Address` 
			FROM `Jobs`
			INNER JOIN `Customers`
			ON `Jobs`.`AccountNum`=`Customers`.`AccountNum`";
$jobs = mysqli_query($conn, $sql2);

//if (mysqli_num_rows($customers) > 0) {
    // output data of each row
//    while($row = mysqli_fetch_assoc($customers)) {
 //       echo "id: " . $row["AccountNum"]. " - Name: " . $row["Address"]. "<br>";
  //  }
//} else {
//    echo "0 results";
//}

$array=mysqli_fetch_array($customers,MYSQLI_ASSOC);
$array2=mysqli_fetch_array($jobs,MYSQLI_ASSOC);
?>

<html>
<body>

<h1>Admin View</h1><br>

	<div style="background-color:gray;">
		<h2>Add Customer</h2>
			<form method="post" action="add-customer.php">
				<label for="name">Name</label>
				<input type="text" name="name"><br>
				<label for="address">Address</label>
				<input type="text" name="address"><br>
				<label for="pin">PIN #</label>
				<input type="text" name="pin"><br>
				<label for="trimservice">Plant Trimming</label>
				<input type="checkbox" name="trimservice" value="true">
				<label for="trashservice">Trash Pick-up</label>
				<input type="checkbox" name="trashservice" value="true">	
				<label for="deadplant">Dead Plant Replacement</label>
				<input type="checkbox" name="deadplant" value="true">
				<label for="weedspray">Weed Spraying</label>
				<input type="checkbox" name="weedspray" value="true"><br>

				<button type="submit">Submit</button>
			</form>
	</div>

	<div style="background-color:red;">
		<h2>Add Job</h2>
			<form method="post" action="add-job.php">
				
				<label for="customer">Address</label>
				<select name="customer">
					<?php foreach($customers as $option) : ?>
						<option value="<?php echo $option['AccountNum']?>"><?php echo $option['Address'];?> </option>
				<?php endforeach; ?>
				</select><br>

				<label for="trimservice">Plant Trimming</label>
				<input type="checkbox" name="trimservice" value="true">
				<label for="trashservice">Trash Pick-up</label>
				<input type="checkbox" name="trashservice" value="true">	
				<label for="deadplant">Dead Plant Replacement</label>
				<input type="checkbox" name="deadplant" value="true">
				<label for="weedspray">Weed Spraying</label>
				<input type="checkbox" name="weedspray" value="true"><br>

				<button type="submit">Submit</button>
			</form>
	</div>

	<div style="background-color:gray;">
		<h2>View Customer</h2>
			<form method="post" action="view-customer.php">
				<label for="customer">Address</label>
				<select name="customer">
					<?php foreach($customers as $option) : ?>
						<option value="<?php echo $option['AccountNum']?>"><?php echo $option['Address'];?> </option>
				<?php endforeach; ?>
				</select><br>
				<button type="submit">Submit</button>
			</form>
	</div>
	<div style="background-color:red;">
		<h2>View Job</h2>
			<form method="post" action="view-job.php">
				<label for="customer">Address</label>
				<select name="customer">
					<?php foreach($jobs as $option) : ?>
						<option value="<?php echo $option['JobNum']?>"><?php echo $option['JobNum'] . ", " . $option['Address'];?> </option>
				<?php endforeach; ?>
				</select><br>
				<button type="submit">Submit</button>
			</form>
	</div>
</body>
</html>