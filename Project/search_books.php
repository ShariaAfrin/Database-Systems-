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
	if(isset($_POST['submit'])){
	$bname=$_POST['name'];
	$author=$_POST['author'];
	$category=$_POST['category'];
    $query = "SELECT publisher_id,book_id,book_name,category,author,publishing_date from books_information where book_name='$bname'||author='$author'||category='$category'";
    $result = mysqli_query($conn,$query);
	if (mysqli_num_rows($result) >=1) {
    // output data of each row
	echo 
	"
	<html>
	<head>
	<title>Search Results</title>
    <link rel='stylesheet' type='text/css' href='sb.css'>
	</head>
	<body>
	<div class='header'>
	<p align='center'><marquee><font size='5' color='yellow' ><b>Search results for ".$bname.",".$author."!</b></font></marquee></p>
	</div>
	<div class='middle_layer'>
	<p align='center'>
	<br>
	<br>
	<br>
	<table border='1' bgcolor='white'>
	<tr rowspan='2'>
	<th colspan='2'>Publisher ID</th>
	<th colspan='2'>Book's_ID</th>
	<th colspan='2'>Book's Name</th>
	<th colspan='2'>Category</th>
	<th colspan='2'>Author</th>
	<th colspan='2'>Publishing Date</th>
	</tr>
	";
    while($row = mysqli_fetch_assoc($result)) {
        echo 
	"<tr rowspan='2'>
	<td colspan='2'>"
	.$row["publisher_id"].
	"</td>
	<td colspan='2'>"
	.$row["book_id"].
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
	.$row["publishing_date"].
	"</td>
	</tr>";
	}
	echo "
	</table>
	<br>
	<br>
	<a href='User_Login.html' onclick='alert('Please get logged in again!')'><button type='button' class='submit'>Go back to User page</button></a>     
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
	<p align='center'><marquee><font size='5' color='yellow' ><b>Search results for ".$bname.",".$author.",".$category."!</b></font></marquee></p>
	</div>
	<div class='middle_layer'>
	<p align='center'>
	<br>
	<br>
	<br>
	<table border='1' bgcolor='white'>
	<tr rowspan='2'>
	<th colspan='2'>Publisher ID</th>
	<th colspan='2'>Book's_ID</th>
	<th colspan='2'>Book's Name</th>
	<th colspan='2'>Category</th>
	<th colspan='2'>Author</th>
	<th colspan='2'>Publishing Date</th>
	</tr>
	<tr rowspan='2'>
	<td colspan='2'><p align='center'>---</p></td>
	<td colspan='2'><p align='center'>---</p></td>
	<td colspan='2'><p align='center'>---</p></td>
	<td colspan='2'><p align='center'>---</p></td>
	<td colspan='2'><p align='center'>---</p></td>
	<td colspan='2'><p align='center'>---</p></td>
	</tr>
	</table>
	<br>
	<br>
	<a href='User_Login.html' onclick='alert('Please get logged in again!')'><button type='button' class='submit'>Go back to User page</button></a>     
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
}
mysqli_close($conn);
?>