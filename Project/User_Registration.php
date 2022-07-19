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
if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
$name = $_POST['name'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$date_of_birth = $_POST['dob'];
$field_of_interest = $_POST['foi'];

if($password1==$password2){
$sql = "INSERT INTO user_detail(user_name,password,email,contact,address,date_of_birth,field_of_interest)
VALUES ('$name','$password1','$email','$contact','$address','$date_of_birth','$field_of_interest')";

if (mysqli_query($conn, $sql)) {
	echo "
<!DOCTYPE html>
<html>
<head>
<title>User Login</title>
<link rel='stylesheet' type='text/css' href='User_Login.css'>
</head>
<body>
<div class='maindiv'>
<div class='form_div'>
<div class='title'>
<h2><marquee>Get logged In $name!</marquee></h2>
</div>
<form action='User_Login.php' method='post'>

<input class='input' name='name' type='text' placeholder='User Name' required>

<input class='input' name='password' type='password' placeholder='Password' required>

<br>

<input class='submit' name='submit' type='submit' value='Go!'>
</form>
<br>
<br>
<br>
<a href='Homepage.html'><button type='button' class='submit' onclick='alert('Welcome to homepage')'>Go back to homepage</button></a>
</div>
</div>
</body>
</html>";

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
else{
	echo "Confirm password by retyping it correctly!";
	echo readfile("User_Registration.html");
}
}
mysqli_close($conn);
?>