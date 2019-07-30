<?php
session_start();
if(!isset($_SESSION["user"]))
	header('Location: /index.html');
$user=$_SESSION["user"];
$uid=$_SESSION["uid"];
if(isset($_POST['msg']))
{
    if($_POST['msg'] == '')
           header('Location: /chat.php');
    $msg=$_POST['msg'];
	//echo $msg;
	//echo "INSERT INTO `message`(`msgid`, `msg`, `fromid`, `date`) VALUES (NULL,'$msg',".$_SESSION['uid'].",NOW());";

$con=mysqli_connect("localhost","id7192357_bharat","12345","id7192357_bharat");
$sql=mysqli_query($con,"INSERT INTO `message`(`msgid`, `msg`, `fromid`, `date`) VALUES (NULL,'$msg',".$_SESSION['uid'].",NOW());");
header('Location: /chat.php');
}
else echo 'waste';
?>