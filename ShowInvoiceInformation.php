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
//GROUPBY
$sql ="SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))";
$result = mysqli_query($conn,$sql) or die("Error1");
//türkçe harf düzeltme
$sql ="SET CHARSET 'utf8'";
$result = mysqli_query($conn,$sql) or die("Error3");
$sql = "SELECT salesman_namesurname,city.Dist_Name,city.City_Name,branch.Branch_name,book.book_name,book.book_price,sales.sale_date,sales.customer_id 
FROM sales,salesmans,book,customers,branch,city 
WHERE  sales.customer_id = customers.customer_id AND branch.Branch_name = customers.Branch_name AND sales.book_id=book.book_id  AND sales.salesman_id= salesmans.salesman_id AND city.City_Name = branch.City_Name AND";
$sql .= " customers.customer_namesurname = '" . $_POST['customer_namesurname'] . "' GROUP BY sales.Sale_id";
echo $_POST['customer_namesurname'];
$result = mysqli_query($conn,$sql) or die("Error2");
if (mysqli_num_rows($result) > 0) {
    // output data of each row
	echo "<table border='1'>";
	echo "<tr><td>District Name</td><td>City Name</td><td>Branch Name</td><td>Salesman Name</td><td>Book Name</td><td>Book Price</td><td>Sale Date</td><td>Customer id</td></tr>";
    while($row = mysqli_fetch_array($result)) {
		echo "<tr>";
        echo "<td>" . $row["Dist_Name"]. "</td><td>" . $row["City_Name"]. "</td><td>" . $row["Branch_name"]. "</td><td>" . $row["salesman_namesurname"]. "</td><td>" . $row["book_name"]. "</td><td>" . $row["book_price"]. "</td><td>" . $row["sale_date"]. "</td><td>" . $row["customer_id"]. "</td>";
		echo "</tr>";
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