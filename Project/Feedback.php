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
if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
$name = $_POST['name'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$city = $_POST['city'];
$field_of_interest = $_POST['foi'];
$id=$_POST['pid'];
$feedback = $_POST['comment'];

$sql = "INSERT INTO Feedback(user_name,email,contact,city,field_of_interest,publisher_id,feedback) VALUES ('$name','$email','$contact','$city','$field_of_interest','$id','$feedback')";

if (mysqli_query($conn, $sql)) {
	echo 'Thanks for your important feedback,dear user!';
	echo 
	"
	<html>
	<head>
	<tile></title>
		<link rel='stylesheet' type='text/css' href='h.css'>
	</head>
		<body background-image='cover.jpg'>
			<div class='header'>
			<p align='center'><table><tr><td colspan='2'><marquee><font size='20' color='white'>Book Review System</font></marquee></td></tr></table></p>
			</div>
			
			<div class='middle_layer'>
			<br>
			<br>
				<ul>
				<li><a href='AdminLogin.html'><b>Administrator</b></a></li>
				<li><a href='PublisherLogin.html'><b>Publisher</b></a></li>
				<li><a href='User_Registration.html'><b>Sign Up</b></a></li>
				<li><a href='User_Login.html'><b>Sign In</b></a></li>
				<li><a href='contact.html'><b>Contact Us</b></a></li>
			</ul>
			</div>
			<div class='footer'>
				<h3 align='center'><font color='white' size='6' >About us...</font><marquee>The publisher will upload the reviews of new books before publishing the book.It will help the user to know the latest books according to their interest.</marquee></h3>
			</div>
		</body>
</html>
	";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
}

mysqli_close($conn);
?>