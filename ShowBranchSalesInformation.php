<!DOCTYPE html>
<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
// Create connection
$dbname = "ilke_savasoglu";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 

$sql = "SELECT distinct(Branch_name) FROM branch";
$result = mysqli_query($conn,$sql) or die("Error1");

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	echo "<form action='Branch_php.php' method='post'>";
	echo '<select name="Branch_name">';
    while($row = mysqli_fetch_array($result)) {
		echo "<option value='" . $row["Branch_name"] . "'>";
        echo $row["Branch_name"];
		echo "</option>";
    }
	echo '</select>';
	echo '<input type="submit" value="Submit">';
	echo "</form>";
} else {
    echo "0 results";
}
mysqli_close($conn);
?>

</body>
</html>