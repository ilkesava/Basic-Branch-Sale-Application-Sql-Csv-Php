<!DOCTYPE html>
<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
// Create connection
$conn = new mysqli($servername, $username, $password);

ini_set('max_execution_time', '1000');
set_time_limit(1000);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE Ilke_Savasoglu";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully\r\n";
} else {
  echo "Error creating database: " . $conn->error;
}
$sql ="SET CHARSET 'utf8'";
if ($conn->query($sql) === TRUE) {
  echo "CHARSET ayarlandi\r\n";
} else {
  echo "Error CHARSET AYARLANMADI: " . $conn->error;
}
$conn->close();

$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "Ilke_Savasoglu";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//TABLE CREATE ETME
$sql = "CREATE TABLE DISTRICT (Dist_Name VARCHAR(50), Dist_id INT  )";
if ($conn->query($sql) === TRUE) {
  echo "District created successfully\r\n  ";
} else {
  echo "Error creating district table: " . $conn->error;
}

$sql = "CREATE TABLE CITY (City_Name VARCHAR(50), City_id INT  , Dist_Name VARCHAR(50))";
if ($conn->query($sql) === TRUE) {
  echo "City  created successfully\r\n  ";
} else {
  echo "Error creating city table: " . $conn->error;
}

$sql = "CREATE TABLE BRANCH (Branch_name VARCHAR(50), City_Name VARCHAR(50), Branch_id INT  )";
if ($conn->query($sql) === TRUE) {
  echo "Branch created successfully\r\n  ";
} else {
  echo "Error creating branch table: " . $conn->error;
}

$sql = "CREATE TABLE SALESMANS ( salesman_id INT NOT NULL  , salesman_namesurname VARCHAR(50), Branch_name VARCHAR(50), Branch_id INT NOT NULL)";
if ($conn->query($sql) === TRUE) {
  echo "Salesmans created successfully\r\n  ";
} else {
  echo "Error creating salesmans table: " . $conn->error;
}
$sql = "CREATE TABLE CUSTOMERS ( customer_id INT  , customer_namesurname VARCHAR(50), Branch_name VARCHAR(50))";
if ($conn->query($sql) === TRUE) {
  echo "customer created successfully\r\n  ";
} else {
  echo "Error creating customer table: " . $conn->error;
}

$sql = "CREATE TABLE BOOK(book_name VARCHAR(50), book_id INT, book_price INT)";
if ($conn->query($sql) === TRUE) {
  echo "Book created successfully\r\n  ";
} else {
  echo "Error creating book table: " . $conn->error;
}

$sql = "CREATE TABLE SALES (Sale_id INT , salesman_id INT  , customer_id INT , book_id INT , sale_amount INT , sale_date DATE, City_Name VARCHAR(50), Branch_name VARCHAR(50), Dist_Name VARCHAR(50))";
if ($conn->query($sql) === TRUE) {
  echo "SALES table created successfully\r\n";
} else {
  echo "Error creating Table: " . $conn->error;
}
//PRIMARY KEY OLUSTURMA
$sql = "ALTER TABLE DISTRICT ADD PRIMARY KEY (`Dist_id`)";
if ($conn->query($sql) === TRUE) {
  echo "Dist_id primary key created successfully\r\n";
} else {
  echo "Dist_id primary key error! " . $conn->error;
}

$sql = "ALTER TABLE CITY ADD PRIMARY KEY (`City_id`)";
if ($conn->query($sql) === TRUE) {
  echo "City_id primary key created successfully\r\n";
} else {
  echo " Dist_id primary key error!" . $conn->error;
}
  
 $sql = "ALTER TABLE BRANCH ADD PRIMARY KEY (`Branch_id`)";
if ($conn->query($sql) === TRUE) {
  echo "Branch_id primary key created successfully\r\n";
} else {
  echo "Branch_id primary key error! " . $conn->error;
}
 $sql = "ALTER TABLE SALESMANS ADD PRIMARY KEY (`salesman_id`)";
if ($conn->query($sql) === TRUE) {
  echo "salesman_id primary key created successfully\r\n";
} else {
  echo "salesman_id primary key error! " . $conn->error;
}
 $sql = "ALTER TABLE CUSTOMERS ADD PRIMARY KEY (`customer_id`)";
if ($conn->query($sql) === TRUE) {
  echo "customer_id primary key created successfully\r\n";
} else {
  echo "customer_id primary key error! " . $conn->error;
}
 $sql = "ALTER TABLE BOOK ADD PRIMARY KEY (`book_id`)";
if ($conn->query($sql) === TRUE) {
  echo "book_id primary key created successfully\r\n";
} else {
  echo "book_id primary key error! " . $conn->error;
}
 $sql = "ALTER TABLE SALES ADD PRIMARY KEY (`Sale_id`)";
if ($conn->query($sql) === TRUE) {
  echo "Sale_id primary key created successfully\r\n";
} else {
  echo "Sale_id primary key error! " . $conn->error;
}


//ARTTIRMA
$sql = "ALTER TABLE CITY MODIFY City_id INT   AUTO_INCREMENT, AUTO_INCREMENT=1";
if ($conn->query($sql) === TRUE) {
  echo "City_id incremented";
} else {
  echo "City_id is not incremented error! " . $conn->error;
}

$sql = "ALTER TABLE DISTRICT MODIFY Dist_id INT   AUTO_INCREMENT, AUTO_INCREMENT=1";
if ($conn->query($sql) === TRUE) {
  echo "Dist_id incremented";
} else {
  echo "Dist_id is not incremented error!" . $conn->error;
}
$sql = "ALTER TABLE BRANCH MODIFY Branch_id INT   AUTO_INCREMENT, AUTO_INCREMENT=1";
if ($conn->query($sql) === TRUE) {
  echo "Branch_id incremented";
} else {
  echo "Branch_id is not incremented error! " . $conn->error;
}
$sql = "ALTER TABLE SALESMANS MODIFY salesman_id INT   AUTO_INCREMENT, AUTO_INCREMENT=1";
if ($conn->query($sql) === TRUE) {
  echo "salesman_id incremented";
} else {
  echo "salesman_id is not incremented error!  " . $conn->error;
}
$sql = "ALTER TABLE CUSTOMERS MODIFY customer_id INT   AUTO_INCREMENT, AUTO_INCREMENT=1";
if ($conn->query($sql) === TRUE) {
  echo "customer_id incremented";
} else {
  echo "customer_id is not incremented error! " . $conn->error;
}
$sql = "ALTER TABLE BOOK MODIFY book_id INT   AUTO_INCREMENT, AUTO_INCREMENT=1";
if ($conn->query($sql) === TRUE) {
  echo "book_id incremented";
} else {
  echo "book_id is not incremented error! " . $conn->error;
}
$sql = "ALTER TABLE SALES MODIFY Sale_id INT   AUTO_INCREMENT, AUTO_INCREMENT=1";
if ($conn->query($sql) === TRUE) {
  echo "Sale_id incremented";
} else {
  echo "Sale_id is not incremented error! " . $conn->error;
}

//CSV EKLEME
$row = 0;
$filename = "csv/District.csv";

if(!file_exists($filename) || !is_readable($filename))
		return FALSE;

$header = NULL;
if (($handle = fopen($filename, 'r')) !== FALSE)
	{
		while (($row = fgetcsv($handle, 1000, ',')) !== FALSE)
		{
			if(!$header)
				$header = $row;
			else{
				$sql = "INSERT INTO DISTRICT (Dist_Name) VALUES ('".$row[0]."')";
				if ($conn->query($sql) === TRUE) {
					} else {
					  echo "Error: " . $sql . "<br>" . $conn->error;
					}
			}
		}
		fclose($handle);
	}
	
$row = 0;
$filename = "csv/Books.csv";

if(!file_exists($filename) || !is_readable($filename))
		return FALSE;

$header = NULL;
if (($handle = fopen($filename, 'r')) !== FALSE)
	{
		while (($row = fgetcsv($handle, 10000, ',')) !== FALSE)
		{
			if(!$header)
				$header = $row;
			else{
				$sql = "INSERT INTO BOOK (book_name,book_price) VALUES ('".$row[1]."','".$row[3]."')";
				if ($conn->query($sql) === TRUE) {
					} else {
					  echo "Error: " . $sql . "<br>" . $conn->error;
					}
			}
		}
		fclose($handle);
	}
	
$row = 0;
$filename = "csv/City.csv";

if(!file_exists($filename) || !is_readable($filename))
		return FALSE;

$header = NULL;
if (($handle = fopen($filename, 'r')) !== FALSE)
	{
		while (($row = fgetcsv($handle, 10000, ',')) !== FALSE)
		{
			if(!$header)
				$header = $row;
			else{
				$sql = "INSERT INTO CITY (City_Name,Dist_Name) VALUES ('".$row[0]."','".$row[1]."')";
				if ($conn->query($sql) === TRUE) {
					} else {
					  echo "Error: " . $sql . "<br>" . $conn->error;
					}
			}
		}
		fclose($handle);
	}
	

$row = 0;
$filename = "csv/newsalesmanbranch.csv";

if(!file_exists($filename) || !is_readable($filename))
		return FALSE;

$header = NULL;
if (($handle = fopen($filename, 'r')) !== FALSE)
	{
		while (($row = fgetcsv($handle, 10000, ',')) !== FALSE)
		{
			if(!$header)
				$header = $row;
			else{
				$sql = "INSERT INTO SALESMANS (salesman_namesurname,Branch_name,Branch_id) VALUES ('".$row[5]. " ".$row[8]. "','".$row[2]."','".$row[3]."')";
				if ($conn->query($sql) === TRUE) {
					} else {
					  echo "Error: " . $sql . "<br>" . $conn->error;
					}
			}
		}
		fclose($handle);
	}


$row = 0;
$filename = "csv/isimsehir.csv";

if(!file_exists($filename) || !is_readable($filename))
		return FALSE;

$header = NULL;
if (($handle = fopen($filename, 'r')) !== FALSE)
	{
		while (($row = fgetcsv($handle, 10000, ',')) !== FALSE)
		{
			if(!$header)
				$header = $row;
			else{
				$sql = "INSERT INTO CUSTOMERS (customer_namesurname,Branch_name) VALUES ('".$row[3]."','".$row[2]."')";
				if ($conn->query($sql) === TRUE) {
					} else {
					  echo "Error: " . $sql . "<br>" . $conn->error;
					}
			}
		}
		fclose($handle);
	}
	
$row = 0;
$filename = "csv/Branch.csv";

if(!file_exists($filename) || !is_readable($filename))
		return FALSE;

$header = NULL;
if (($handle = fopen($filename, 'r')) !== FALSE)
	{
		while (($row = fgetcsv($handle, 10000, ',')) !== FALSE)
		{
			if(!$header)
				$header = $row;
			else{
				$sql = "INSERT INTO BRANCH (City_Name,Branch_name) VALUES ('".$row[0]."','".$row[2]."')";
				if ($conn->query($sql) === TRUE) {
					} else {
					  echo "Error: " . $sql . "<br>" . $conn->error;
					}
			}
		}
		fclose($handle);
	}
	
// FOREIGN KEY EKLEME

// $sql = "ALTER TABLE `SALES` ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `CUSTOMERS` (`customer_id`), ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`salesman_id`) REFERENCES `SALESMANS` (`salesman_id`),
  // ADD CONSTRAINT `sales_ibfk_3` FOREIGN KEY (`book_id`) REFERENCES `BOOK` (`book_id`) ON DELETE CASCADE";
// if ($conn->query($sql) === TRUE) {
  // echo "Foreign keys created successfully \r\n";
// } else {
  // echo "foreign key cannot created error!   " . $conn->error;
// }




//GEZME DENEMSI
$row = 0;
$rowx = 0;
$rowy = 0;
$count = 0;
$deger =3;
$filename = "csv/2saat.csv";

if(!file_exists($filename) || !is_readable($filename))
		return FALSE;

$header = NULL;
if (($handle = fopen($filename, 'r')) !== FALSE)
	{
		while (($row = fgetcsv($handle, 10000, ',')) !== FALSE)
		{
			if(!$header)
			$header = $row;
			else{
											$min = strtotime('2012-09-04');
											$max = strtotime('2021-09-04');
											$val = rand($min, $max);
											$rand=date('Y-m-d', $val);
											$valx = rand(3, 5);
											$sql = "INSERT INTO SALES (salesman_id  , customer_id, book_id, sale_amount, sale_date,City_Name, Branch_name, Dist_Name ) VALUES ('".$row[9]."','".$row[4]."','".$row[10]."','".$valx."','".$rand."','".$row[0]."','".$row[2]."','".$row[1]."')";
										if ($conn->query($sql) === TRUE) {
											} else {
											  echo "Error: " . $sql . "<br>" . $conn->error;
											}
			}
		}
		fclose($handle);
		
	
	}
$conn->close();



?>

</body>
</html>