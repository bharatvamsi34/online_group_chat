<?php
session_start();
$pswd=$_POST['pswd'];
$otp=$_POST['otp'];
$email=$_SESSION['user'];
$random=$_SESSION['random'];
if($otp==$random)
{
$con=mysqli_connect("localhost","id7192357_bharat","12345","id7192357_bharat");
$sql=mysqli_query($con,"UPDATE `users` SET password='$pswd' WHERE email='$email';");
echo '<script type="text/javascript">'; 
echo 'alert("your password has been successfully changed");'; 
echo 'window.location.href = "/index.html";';
echo '</script>';
}
?>