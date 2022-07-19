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
    $query = "SELECT user_name,password from user_detail where user_name='$username' && password='$password'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0)
    {
		session_start();
		echo "<p align='center'>You are logged in as an User!</p>";
		echo "
	<html>
	<head>
	<title></title>
		<link rel='stylesheet' type='text/css' href='UserPage.css'>
	</head>
		<body>
			<div class='header'>
			<h1 align='center'>Hello,".$username."!</h1>
			</div>
			<div class='middle_layer'>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
				<ul><li><a href='lb.php'>Latest Books</a></li></ul>
				<ul><li><a href='sb.html'>Search Books</a></li></ul>
				<ul><li><a href='br.php'>Book Reviews</a></li></ul>
				<ul><li><a href='feedback.html'>Feedback</a></li></ul>
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