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
	$id=$_POST['pid'];
	$pass=$_POST['pwd'];
    $query = "SELECT user_name,email,contact,city,field_of_interest,feedback from feedback where publisher_id=(SELECT publisher_id from publisher_panel where publisher_id='$id'&&password='$pass')";
    $result = mysqli_query($conn,$query);
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
	echo 
	"
	<html>
	<head>
	<title>Feedback</title>
    <link rel='stylesheet' type='text/css' href='view.css'>
	</head>
	<body>
	<div class='header'>
	<p align='center'><font size='5' color='white'><b>#Publisher ID: </b>".$id."</font><marquee><font size='5' color='yellow' ><b>Feedback!</b></font></marquee></p>
	</div>
	<div class='middle_layer'>
	<p align='center'>
	<br>
	<br>
	<br>
	<table border='1' bgcolor='white'>
	<tr rowspan='2'>
	<th colspan='2'>Name</th>
	<th colspan='2'>E-mail</th>
	<th colspan='2'>Contact</th>
	<th colspan='2'>Current City</th>
	<th colspan='2'>Field of interest</th>
	<th colspan='2'>Feedback</th>
	</tr>
	";
    while($row = mysqli_fetch_assoc($result)) {
        echo 
	"<tr rowspan='2'>
	<td colspan='2'>"
	.$row["user_name"].
	"</td>
	<td colspan='2'>"
	.$row["email"].
	"</td>
	<td colspan='2'>"
	.$row["contact"].
	"</td>
	<td colspan='2'>"
	.$row["city"].
	"</td>
	<td colspan='2'>"
	.$row["field_of_interest"].
	"</td>
	<td colspan='2'>"
	.$row["feedback"].
	"</td>
	</tr>";
	}
	echo "
	</table>
	<br>
	<br>
	<a href='delete.html'><button type='button' class='submit'>Delete a feedback</button></a>     
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
	<title>Feedback</title>
    <link rel='stylesheet' type='text/css' href='view.css'>
	</head>
	<body>
	<div class='header'>
	<p align='center'><font size='5' color='white'><b>#Publisher ID: </b>".$id."</font><marquee><font size='5' color='yellow' ><b>Feedback!</b></font></marquee></p>
	</div>
	<div class='middle_layer'>
	<p align='center'>
	<br>
	<br>
	<br>
	<table border='1' bgcolor='white'>
	<tr rowspan='2'>
	<th colspan='2'>Name</th>
	<th colspan='2'>E-mail</th>
	<th colspan='2'>Contact</th>
	<th colspan='2'>Current City</th>
	<th colspan='2'>Field of interest</th>
	<th colspan='2'>Feedback</th>
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
	<a href='delete.html'><button type='button' class='submit'>Delete a feedback</button></a>     
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