<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book_review_system";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
    $query = "SELECT publisher_id,book_name,category,author,abstract from books_information";
    $result = mysqli_query($conn,$query);
	if (mysqli_num_rows($result) >=1) {
    // output data of each row
	echo 
	"
	<html>
	<head>
	<title>Book Reviews</title>
    <link rel='stylesheet' type='text/css' href='sb.css'>
	</head>
	<body>
	<div class='header'>
	<p align='center'><marquee><font size='5' color='yellow' ><b>Book's Infromation!</b></font></marquee></p>
	</div>
	<div class='middle_layer'>
	<p align='center'>
	<br>
	<br>
	<br>
	<table border='1' bgcolor='white'>
	<tr rowspan='2'>
	<th colspan='2'>Publisher ID</th>
	<th colspan='2'>Book's Name</th>
	<th colspan='2'>Category</th>
	<th colspan='2'>Author</th>
	<th colspan='2'>Abstract</th>
	</tr>
	";
    while($row = mysqli_fetch_assoc($result)) {
        echo 
	"<tr rowspan='2'>
	<td colspan='2'>"
	.$row["publisher_id"].
	"</td>
	<td colspan='2'>"
	.$row["book_name"].
	"</td>
	<td colspan='2'>"
	.$row["category"].
	"</td>
	<td colspan='2'>"
	.$row["author"].
	"</td>
	<td colspan='2'>"
	.$row["abstract"].
	"</td>
	</tr>";
	}
	echo "
	</table>
	<br>
	<br>
	<a href='AdminLogin.html' onclick='alert('Please get logged in again!')'><button type='button' class='submit'>Go back to User page</button></a>     
	</p>
	<br>
	</div>
	<div class='footer'>
				<h3 align='center'><a href='Homepage.html'>Go back to homepage</a></h3>
			</div>
	</body>
	<html>";
}
else{
	echo
	"
	<html>
	<head>
	<title>Search Results</title>
    <link rel='stylesheet' type='text/css' href='sb.css'>
	</head>
	<body>
	<div class='header'>
	<p align='center'><marquee><font size='5' color='yellow' ><b>Book's Infromation!</b></font></marquee></p>
	</div>
	<div class='middle_layer'>
	<p align='center'>
	<br>
	<br>
	<br>
	<table border='1' bgcolor='white'>
	<tr rowspan='2'>
	<th colspan='2'>Publisher ID</th>
	<th colspan='2'>Book's Name</th>
	<th colspan='2'>Category</th>
	<th colspan='2'>Author</th>
	<th colspan='2'>Abstract</th>
	</tr>
	<tr rowspan='2'>
	<td colspan='2'><p align='center'>---</p></td>
	<td colspan='2'><p align='center'>---</p></td>
	<td colspan='2'><p align='center'>---</p></td>
	<td colspan='2'><p align='center'>---</p></td>
	<td colspan='2'><p align='center'>---</p></td>
	</tr>
	</table>
	<br>
	<br>
	<a href='AdminLogin.html'><button type='button' class='submit'>Go back to Admin page</button></a>     
	</p>
	<br>
	</div>
	<div class='footer'>
				<h3 align='center'><a href='Homepage.html'>Go back to homepage</a></h3>
			</div>
	</body>
	<html>
	";
}	
	}
mysqli_close($conn);
?>