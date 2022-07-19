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
if(isset($_POST['submit'])) // Fetching variables of the form which travels in URL
{
    $username = $_POST['name'];
    $password = $_POST['password'];
    $query = "SELECT publisher_name,password from publisher_panel where publisher_name='$username' && password='$password'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0)
    {
		echo "<p align='center'>You are logged in as a Publisher!</p>";
		echo "
	<html>
	<head>
	<title>Publisher Page</title>
		<link rel='stylesheet' type='text/css' href='PublisherPage.css'>
	</head>
		<body>
			<div class='header'>
			<h1 align='center'>Hello,$username !</h1>
			</div>
			<div class='middle_layer'>
			<br>
			<br>
			<ul><li><a href=''>Book Entry</a></li></ul>
			<ul><li><a href=''>Delete Book</a></li></ul>
			<ul><li><a href=''>View Books</a></li></ul>
			<ul><li><a href='vf.html'>View Feedback</a></li></ul>
			<ul><li><a href=''>Log Out</a></li></ul>
			</div>
			<div class='footer'>
				<h3 align='center'><a href='Homepage.html'>Go back to homepage</a></h3>
			</div>
		</body>
</html>";
    }
}
	mysqli_close($conn);
?>