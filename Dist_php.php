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
$result = mysqli_query($conn,$sql) or die("Error");
$sql = "SELECT sales.salesman_id,MIN((sales.sale_amount * book.book_price)) as minimumPrice, MAX((sales.sale_amount * book.book_price)) as maximumPrice, SUM((sales.sale_amount*book.book_price)) as TotalSaleIncome, salesmans.salesman_namesurname , sales.City_Name,sales.Dist_Name, salesmans.Branch_name,sales.Branch_name , sales.customer_id  , customers.customer_namesurname 
FROM book , sales , salesmans , customers
Where book.book_id = sales.book_id AND sales.salesman_id=salesmans.salesman_id AND sales.customer_id = customers.customer_id
AND ";
$sql .= "sales.Dist_Name = '" . $_POST['Dist_Name'] . "' GROUP BY sales.Branch_name ";
$result = mysqli_query($conn,$sql) or die("Error");

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	echo "<table border='1'>";
	echo "<tr><td>Salesman id</td><td>Salesman name</td><td>Customer id</td><td>Customer Name Surname</td><td>Maximum Price</td><td>Total sale income</td><td>Minimum Price</td><td>Dist Name</td><td>Branch Name</td><td>City Name</td></tr>";
    while($row = mysqli_fetch_array($result)) {
		echo "<tr>";
        echo "<td>" . $row["salesman_id"]. "</td><td>" . $row["salesman_namesurname"]. "</td><td>" .$row["customer_id"]. "</td><td>".$row["customer_namesurname"]. "</td><td>" . $row["maximumPrice"]. "</td><td>" . $row["TotalSaleIncome"]."</td><td>" .$row["minimumPrice"]. "</td><td>" .$row["Dist_Name"]. "</td><td>".$row["Branch_name"]. "</td><td>".$row["City_Name"]. "</td>";
		echo "</tr>";
    }
	echo "</table>";
} else {
    echo "0 results";
}
$sql = "SELECT sales.salesman_id, MAX((sales.sale_amount * book.book_price)) as Price, salesmans.salesman_namesurname , salesmans.Branch_name, SUM((sales.sale_amount*book.book_price)) as TotalSaleIncome, sales.City_Name,sales.Dist_Name,sales.Branch_name , sales.customer_id , customers.customer_namesurname
FROM  sales , salesmans , customers,book 
Where book.book_id = sales.book_id  AND sales.customer_id = customers.customer_id AND sales.salesman_id=salesmans.salesman_id
AND
sales.Dist_Name = '". $_POST['Dist_Name'] . "'
GROUP BY sales.salesman_id";
$result = mysqli_query($conn,$sql) or die("Error");
if (mysqli_num_rows($result) > 0) {
    // output data of each row
	echo "<table border='1'>";
	echo "<tr><td>Salesman ID</td><td>Salesman name</td><td>Customer ID</td><td>Customer Name</td><td>Maximum Payment</td><td>Total sale income</td><td>City Name</td><td>District Name</td><td>Branch Name</td></tr>";
    while($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		  echo "<td>" . $row["salesman_id"]. "</td><td>" . $row["salesman_namesurname"]. "</td><td>" .$row["customer_id"]. "</td><td>".$row["customer_namesurname"]. "</td><td>" . $row["Price"]. "</td><td>" . $row["TotalSaleIncome"]. "</td><td>" .$row["City_Name"]. "</td><td>" .$row["Dist_Name"]. "</td><td>".$row["Branch_name"]. "</td>";
		echo "</tr>";
    }
	echo "</table>";
} else {
    echo "0 results";
}
mysqli_close($conn);
?>