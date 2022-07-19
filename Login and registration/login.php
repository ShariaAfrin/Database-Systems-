    <!doctype html>  
    <html>  
    <head>  
    <title>Login</title>  
        <style>   
            body{        
        margin-top: 100px;  
        margin-bottom: 100px;  
        margin-right: 150px;  
        margin-left: 80px;    
        color:#9ACD32;  
        font-family: verdana;  
        font-size: 130%;
        background-image: url("https://cdn.stocksnap.io/img-thumbs/960w/MAR4PYIFWE.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;  
          text-align:center;
            }  
                 h1 {  
        color:#66FFFF;  
        font-family: helvetica;  
        font-style: bold;
        font-size: 180%;  
    }  
             h2 {  
        color: #00FFFF;  
        font-family: helvetica;  
        font-size: 150%;    
    } </style>  
    </head>  
    <body>  
         <center><h1>LOGIN FORM FOR USERS</h1></center>  
       <p><a href="register.php">Register</a> | <a href="login.php">Login</a></p>  
    <h2>Sign In</h2>  
    <form action="" method="POST">  
    Username:<br>
    <input type="text" name=""><br />  
    Password:<br>
    <input type="password" name=""><br />   
    <input type="submit" value="Login" name="submit" />  
    </form> 
    <p>Not registered yet? <a href='registration.php'>Register Here</a></p> 
    <?php  
    if(isset($_POST["submit"])){  
      
    if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
        $user=$_POST['user'];  
        $pass=$_POST['pass'];  
      
        $con=mysql_connect('localhost','root','') or die(mysql_error());  
        mysql_select_db('user_registration') or die("cannot select DB");  
      
        $query=mysql_query("SELECT * FROM login WHERE username='".$user."' AND password='".$pass."'");  
        $numrows=mysql_num_rows($query);  
        if($numrows!=0)  
        {  
        while($row=mysql_fetch_assoc($query))  
        {  
        $dbusername=$row['username'];  
        $dbpassword=$row['password'];  
        }  
      
        if($user == $dbusername && $pass == $dbpassword)  
        {  
        session_start();  
        $_SESSION['sess_user']=$user;  
      
        /* Redirect browser */  
        header("Location: member.php");  
        }  
        } else {  
        echo "Invalid username or password!";  
        }  
      
    } else {  
        echo "All fields are required!";  
    }  
    }  
    ?>  
    </body>  
    </html>   
