<?php
session_start();

if(!isset($_POST['submit']))
{
    echo '<script type="text/javascript">'; 
    echo 'alert("Enter valid Emailid");'; 
    echo 'window.location.href = "/forgotpswd.html";';
    echo '</script>';
    //header('Location: /forgotpswd.html');
}
        $email=$_POST['email'];
        $con=mysqli_connect("localhost","id7192357_bharat","12345","id7192357_bharat");
        $sql=mysqli_query($con,"SELECT * FROM `users` WHERE email='$email';");
        $count=mysqli_num_rows($sql);
        //echo $count;
if($count==1)
{
	$_SESSION["user"]=$email;
	$_SESSION['random']=mt_rand(1000,10000);
	mail($email,"My subject",$_SESSION['random']);
	//echo $_SESSION['random']." ".$_SESSION["user"];
	//header('Location: /chat.php');
}
else
{
    echo '<script type="text/javascript">'; 
    echo 'alert("Your Emailid is not in records !");'; 
    echo 'window.location.href = "/forgotpswd.html";';
    echo '</script>';
	//header('Location: /index.html');
}
?>
<html>
<head>
<style type="text/css">
body {
   background-image: url("3.jpg");
   height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
	color:red;
}
.div1 {
  padding: 20px;
  max-width: 450px;
  margin: 50px auto;
  border-radius: 4px;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 27, 1);
  transition: .5s ease;
  opacity: 0.5;
    filter: alpha(opacity=50);
}

.div1:hover {
	box-shadow: 0px 0px 20px 16px rgba(18,18,18,.80);
	opacity: 1.0 ;
    filter: alpha(opacity=100);
	}
input[type=text] {
  font-size: 17px;
  display: block;
  width: 85%;
  height: 10%;
  padding: 5px 10px;
  background: #fff;
  background-image: none;
  border: 1px solid #4d94ff;
  color:black;
  margin-left:10px;
}
input:focus{
  outline: 0;
  border-color: #000;
}
.button {
  border: 0;
  outline: none;
  border-radius: 10px;
  padding: 15px 0;
  font-size: 2rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .1em;
  background: #4d94ff;
  color: #ffffff;
  transition: all 0.5s ease;
}
.button:hover, .button:focus {
  background: #ff0055;
}

.button-block {
  display: block;
  width: 100%;
}
::placeholder { 
    color: #ff4d94;
    opacity: 1; }
</style>
</head>
<body align="center">
<div class="div1">
<form action="verifyotp.php" method="post">
<img src="lock.png" height="100" width="100">
<p><h1 style="font-size: 50px;">Change Password!</h1></p>
<input type="text" name="otp" placeholder="Enter 4 digit OTP"><br>
<p><h2 style="font-size: 30px;">New Password:</h2></p>
<input type="password" name="pswd" placeholder="Enter New Password"><br><br>
<input class="button button-block" type="submit" name="submit" value="submit">
</form>
</div>
<script  src="index.js"></script>
</body>
</html>
