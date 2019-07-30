<?php
session_start();
if(!isset($_SESSION["user"]))
	header('Location: /blog.html');
$otp=$_SESSION["otp"];
$pswd=$_SESSION["pwd"];
?>