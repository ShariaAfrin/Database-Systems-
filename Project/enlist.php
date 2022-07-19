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
$id = $_POST['id'];
$name = $_POST['name'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$city = $_POST['city'];
$field_of_interest = $_POST['foi'];

if($password1==$password2){
$sql = "INSERT INTO publisher_panel(publisher_id,publisher_name,password,email,contact,city,field_of_interest)
VALUES ('$id','$name','$password1','$email','$contact','$city','$field_of_interest')";
    if (mysqli_query($conn, $sql)) {
		
		echo "<p align='center'>Successfully added a publisher!</p>";
		echo "
<html>
<head>
<title>Enlist Publishers</title>
<link rel='stylesheet' type='text/css' href='enlist.css'>
</head>
<body>
<div class='maindiv'>
<div class='form_div'>
<div class='title'>
<h2><marquee>Enlist Publisher!</marquee></h2>
</div>
<form action='enlist.php' method='post'>

<input class='input' name='id' type='text' placeholder='Publisher ID' required>

<input class='input' name='name' type='text' placeholder='Publisher Name' required>

<input class='input' name='password1' type='password' placeholder='Create Password' required>

<input class='input' name='password2' type='password' placeholder='Retype Password' required>

<input class='input' name='email' type='text' placeholder='E-mail' required>

<input class='input' name='contact' type='text' placeholder='Phone Number' required>

<input class='input' name='city' type='text' placeholder='Current City' required>

<label> Select Category </label>
<br>
<input type='radio' name='foi' value='Science and Technology' required><label>Science and Technology</label><br>
<input type='radio' name='foi' value='Anime' required><label>Anime</label><br>
<input type='radio' name='foi' value='Horror' required><label>Horror</label></label><br>
<input type='radio' name='foi' value='Superhero' required><label>Superhero</label><br>
<input type='radio' name='foi' value='Romantic' required><label>Romantic</label><br>
<input type='radio' name='foi' value='Photography' required><label>Photography</label><br>
<input type='radio' name='foi' value='Architecture' required><label>Architecture</label> 

<input class='submit' name='submit' type='submit' value='insert'>
</form>
<br>
<a href='Homepage.html'><button type='button' class='submit'>Go back to homepage</button></a>
</div>
</div>

</body>

 ";} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
else{
	echo "Confirm password by retyping it correctly!";
	echo "
<html>
<head>
<title>Enlist Publishers</title>
<link rel='stylesheet' type='text/css' href='enlist.css'>
</head>
<body>
<div class='maindiv'>
<div class='form_div'>
<div class='title'>
<h2><marquee>Enlist Publisher!</marquee></h2>
</div>
<form action='enlist.php' method='post'>

<input class='input' name='id' type='text' placeholder='Publisher ID' required>

<input class='input' name='name' type='text' placeholder='Publisher Name' required>

<input class='input' name='password1' type='password' placeholder='Create Password' required>

<input class='input' name='password2' type='password' placeholder='Retype Password' required>

<input class='input' name='email' type='text' placeholder='E-mail' required>

<input class='input' name='contact' type='text' placeholder='Phone Number' required>

<input class='input' name='city' type='text' placeholder='Current City' required>

<label> Select Category </label>
<br>
<input type='radio' name='foi' value='Science and Technology' required><label>Science and Technology</label><br>
<input type='radio' name='foi' value='Anime' required><label>Anime</label><br>
<input type='radio' name='foi' value='Horror' required><label>Horror</label></label><br>
<input type='radio' name='foi' value='Superhero' required><label>Superhero</label><br>
<input type='radio' name='foi' value='Romantic' required><label>Romantic</label><br>
<input type='radio' name='foi' value='Photography' required><label>Photography</label><br>
<input type='radio' name='foi' value='Architecture' required><label>Architecture</label> 

<input class='submit' name='submit' type='submit' value='insert'>
</form>
<br>
<a href='Homepage.html'><button type='button' class='submit'>Go back to homepage</button></a>
</div>
</div>

</body>


 ";
}
}
mysqli_close($conn);
?>