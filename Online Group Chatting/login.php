<?php
session_start();
$email=$_POST["emil"];
$pswd=$_POST["pswd"];
$con=mysqli_connect("localhost","id7192357_bharat","12345","id7192357_bharat");
$c=mysqli_query($con,"SELECT * FROM `users` WHERE email='$email' and password='$pswd';");
$count=mysqli_num_rows($c);

if($count==1)
{
    $row=mysqli_fetch_array($c);
	$_SESSION["user"]=$email;
	$_SESSION['uid']=$row['id'];
	$_SESSION['fn']=$row['firstname'];
	header('Location: /chat.php');
	//$d=mysqli_query($con,"SELECT firstname FROM `users` WHERE id=$uid;");
	
	echo $row['firstname'];
	echo $_SESSION['uid'];
}
else
	header('Location: /index.html');

?>