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
    $query = "SELECT admin_name,password from admin_panel where admin_name='$username' && password='$password'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0)
    {
		echo "<p align='center'>You are logged in as an Admin!</p>";
		echo "
	<html>
	<head>
	<title>Admin Page</title>
		<link rel='stylesheet' type='text/css' href='AdminPage.css'>
	</head>
		<body>
			<div class='header'>
			<h1 align='center'>Hello,".$username."!</h1>
			</div>
			<div class='middle_layer'>
			<br>
			<br>
			<br>
			<ul><li><a href='EnlistedPublisher.html'>Enlist Publishers</a></li></ul>
			<ul><li><a href='publisher.php'>View Publishers</a></li></ul>
			<ul><li><a href='user.php'>View Users</a></li></ul>
			<ul><li><a href='abv.php'>View Books Information</a></li></ul>
			<ul><li><a href='logout.php'>Log Out</a></li></ul>
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