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
    $query = "SELECT publisher_id,publisher_name,email,contact,city,field_of_interest from publisher_panel";
    $result = mysqli_query($conn,$query);
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
	echo 
	"
	<html>
	<head>
	<title>Viewing Publishers</title>
		<link rel='stylesheet' type='text/css' href='AdminPage.css'>
	</head>
	<body>
	<div class='header'>
	<p align='center'><marquee><font size='9' color='white'>Enlisted Publishers!</font></marquee></p>
	</div>
	<div class='middle_layer'>
	<p align='center'>
	<br>
	<br>
	<br>
	<table border='1' bgcolor='white'>
	<tr rowspan='2'>
	<th colspan='2'> Publisher_ID </th>
	<th colspan='2'> Name </th>
	<th colspan='2'> E-mail </th>
	<th colspan='2'> Contact </th>
	<th colspan='2'> Current City </th>
	<th colspan='2'> Field of interest </th>
	</tr>
	";
    while($row = mysqli_fetch_assoc($result)) {
        echo 
	"<tr rowspan='2'>
	<td colspan='2'>"
	.$row["publisher_id"].
	"</td>
	<td colspan='2'>"
	.$row["publisher_name"].
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
	</tr>";
	}
	echo "
	</table>
	</p>
	<br>
	<br>
	<a href='AdminLogin.html'><button type='button' class='submit'>Go back to Admin page</button></a>  
	</div>
	<div class='footer'>
				<h3 align='center'><a href='Homepage.html'>Go back to homepage</a></h3>
			</div>
	</body>
	</html>";
} else {
    echo "
	<html>
	<head>
	<title>Viewing Publishers</title>
		<link rel='stylesheet' type='text/css' href='AdminPage.css'>
	</head>
	<body>
	<div class='header'>
	<p align='center'><marquee><font size='9' color='white'>Enlisted Publishers!</font></marquee></p>
	</div>
	<div class='middle_layer'>
	<p align='center'>
	<br>
	<br>
	<br>
	<table border='1' bgcolor='white'>
	<tr rowspan='2'>
	<th colspan='2'> Publisher_ID </th>
	<th colspan='2'> Name </th>
	<th colspan='2'> E-mail </th>
	<th colspan='2'> Contact </th>
	<th colspan='2'> Current City </th>
	<th colspan='2'> Field of interest </th>
	</tr>
	<tr rowspan='2'>
	<td colspan='2'>
	<p align='center'>---</p>
	</td>
	<td colspan='2'>
	<p align='center'>---</p>
	</td>
	<td colspan='2'>
	<p align='center'>---</p>
	</td>
	<td colspan='2'>
	<p align='center'>---</p>
	</td>
	<td colspan='2'>
	<p align='center'>---</p>
	</td>
	<td colspan='2'>
	<p align='center'>---</p>
	</td>
	</tr>
	</table>
	</p>
	<br>
	<br>
	<a href='AdminLogin.html'><button type='button' class='submit'>Go back to Admin page</button></a>  
	</div>
	<div class='footer'>
				<h3 align='center'><a href='Homepage.html'>Go back to homepage</a></h3>
			</div>
	</body>
	</html>
	";
}
}
mysqli_close($conn);
?>