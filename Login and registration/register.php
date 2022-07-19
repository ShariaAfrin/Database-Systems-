    <!doctype html>  
    <html>  
    <head>  
    <title>Register</title> 
        <style> 
            body{  
        margin-top: 90px;  
        margin-bottom: 100px;  
        margin-right: 150px;  
        margin-left: 80px;    
        color: white;  
        font-family: verdana;  
        font-size: 130%;
        background-image: url("https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/gettyimages-865109088-1548970937.jpg?crop=1.00xw:0.752xh;0,0.248xh&resize=980:*");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        text-align:center;

    }  
                h1 {  
        color: white;  
        font-family: helvetica;  
        font-style: bold;
        font-size: 200%;  
    }  
             h2 {  
        color: white;  
        font-family: helvetica;  
        font-size: 150%;  
    }</style>  
    </head>  
    <body>  
        <center><h1>REGISTRATION FORM FOR USERS</h1></center>  
       <p><a href="register.php">Register</a> | <a href="login.php">Login</a></p>  
        <center><h2>Create an account</h2></center>  
    <form action="" method="POST">    
      
   Username: <input type="text" name="user"><br/>  
    Email: <input type="text" name="email"><br/>
    Phone No:<input type="text" name="phone"><br/>
    Date of Birth:<input type="date" name="dob"><br/>
    Field of interest:<input type="text" name="foi"><br/>
    Password: <input type="password" name="pass"><br /> 
    Re-Password: <input type="password" name="re-pass"><br/> 
    <input type="submit" value="Register" name="submit"/>  
            
    </form>  
    <?php  
If(isset($_REQUEST['submit'])!='')
{
If($_REQUEST['user']=='' || $_REQUEST['email']=='' || $_REQUEST['phone']==''|| $_REQUEST['dob']==''|| $_REQUEST['foi']==''|| $_REQUEST['pass']==''|| $_REQUEST['re-pass']=='')
{
Echo "Please fill the empty field.";
}
Else
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
$sql = "CREATE TABLE user (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Username VARCHAR(30) NOT NULL,
Email VARCHAR(50),
Phone_no VARCHAR(15),
Date_of_birth DATE,
Field_of_interest VARCHAR(100),
Password VARCHAR(50),
Re_password VARCHAR(50)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Mary', 'Moe', 'mary@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Julie', 'Dooley', 'julie@example.com')";

if (mysqli_multi_query($conn, $sql)) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$sql="insert into user(Username,Email,Phone_no,Date_of_birth,Field_of_interest,Password,Re_password) values('".$_REQUEST['user']."', '".$_REQUEST['email']."', '".$_REQUEST['phone']."','".$_REQUEST['dob']."', '".$_REQUEST['foi']."','".$_REQUEST['pass']."','".$_REQUEST['re-pass']."')";
$res=mysqli_query($conn,$sql);
If($res)
{
Echo "Record successfully inserted";
}
Else
{
Echo "There is some problem in inserting record";
}

}
}

?>  
    </body>  
    </html>   