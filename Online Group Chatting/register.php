<?php
$fn=$_POST["fname"];
$ln=$_POST["lname"];
$email=$_POST["emil"];
$pswd=$_POST["pswd"];

$con=mysqli_connect("localhost","id7192357_bharat","12345","id7192357_bharat");

mysqli_query($con,"INSERT INTO `users`(`id`, `firstname`, `lastname`, `email`, `password`) VALUES (NULL,'$fn','$ln','$email','$pswd');");
echo '<script type="text/javascript">'; 
echo 'alert("Successfully Registered");'; 
echo 'window.location.href = "/index.html";';
echo '</script>';

?>