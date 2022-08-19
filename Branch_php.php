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
$sql = "SELECT sales.customer_id , customer_namesurname, SUM(book_price) as total , SUM(sale_amount) as TotalSale FROM sales,customers,book WHERE sales.customer_id = customers.customer_id AND sales.book_id=book.book_id AND ";
$sql .= "sales.Branch_name = '" . $_POST['Branch_name'] . "' GROUP BY customer_id" ;
$result = mysqli_query($conn,$sql) or die("Error2");

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	echo "<table border='1'>";
	echo "<tr><td>Customer Name</td><td>Customer id</td><td>Total Price Sale</td><td>Number of Sale done</td></tr>";
    while($row = mysqli_fetch_array($result)) {
		echo "<tr>";
        echo "<td>" . $row["customer_namesurname"]. "</td><td>" . $row["customer_id"]. "</td><td>" . $row["total"]."</td><td>" . $row["TotalSale"]. "</td>";
		echo "</tr>";
    }
	echo "</table>";
} else {
    echo "0 results";
}
$sql = "SELECT sales.salesman_id , salesman_namesurname, SUM(book_price) as total , SUM(sale_amount) as TotalSale FROM sales,salesmans,book WHERE sales.salesman_id = salesmans.salesman_id AND sales.book_id=book.book_id and ";
$sql .= "sales.Branch_name = '" . $_POST['Branch_name'] . "' GROUP BY salesman_id";
$result = mysqli_query($conn,$sql) or die("Error3");
if (mysqli_num_rows($result) > 0) {
    // output data of each row
	echo "<table border='1'>";
	echo "<tr><td>Salesman Name</td><td>Salesman id</td><td>Total Price of Sales</td><td>Number of Sale performed</td></tr>";
    while($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		  echo "<td>" . $row["salesman_namesurname"]. "</td><td>" . $row["salesman_id"]. "</td><td>" . $row["total"]."</td><td>" . $row["TotalSale"]. "</td>";
		echo "</tr>";
    }
	echo "</table>";
} else {
    echo "0 results";
}
mysqli_close($conn);
?>