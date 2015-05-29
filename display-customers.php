<?php
require( 'connect.php' );
$sql = "SELECT * FROM Customers";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["AccountNum"]. " - Name: " . $row["Name"]."<br>";
    }
} else {
    echo "0 results";
}

//mysqli_close($conn);
?>

