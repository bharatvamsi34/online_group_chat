<?php
session_start();
if(!isset($_SESSION['user']))
{
    header('Location: /index.html');
}
$user=$_SESSION["user"];
$uid=$_SESSION["uid"];
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="30">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: Arial;
    color: white;
}

.split {
    height: 100%;
    position: fixed;
    z-index: 1;
    top: 0;
    overflow-x: hidden;
    padding-top: 20px;
}

.left {
    left: 0;
	width: 20%;
	padding:0 1%;
    background-color:#ff9900;

}

.right {
    right: 0;
	width: 80%;
    background-color:#cccccc;
	background-image: url("14.jpg");
	background-repeat: no-repeat;
	background-position: center;
	background-size: cover;
}
.topp {
   height:82%;
   padding:0 1%;
   overflow-y:scroll;
}
.bottomm {
   height:18%;
   position:relative;
}

.bottomm input{
	width:85%;
	float:left;
	margin:0 10px;
}

.bottomm button{
	width:15%;
	float:left;
}

.mleft{
float:left;
background:#ff3385;
border-radius:16px;
padding:10px;
margin-bottom:10px;
}

.mright{
float:right;
background:purple;
border-radius:16px;
padding:10px;
margin-bottom:10px;
}


input[type=text] 
{
    width: 80%;
    padding: 12px 20px;
    box-sizing: border-box;
}
.button {
  display: block;
  padding: 10px;
  background-color: #555555;
  border: none;
  border-radius: 13px;
  font-size: 25px;
  margin-top:4px;
  color:white;
}
.button1 {
  display: block;
  padding: 7px;
  background-color: #008CBA;
  border: none;
  border-radius: 14px;
  font-size: 25px;
  color:white;
  
}
</style>
</head>
<body>
<div>
</div>
<div class="split left">
  <div class="centered">
      <p align="center">
<img src="user.png" style="margin-right:20px;" height="150" width="150">
</p>
     <?php
     $fn=$_SESSION['fn'];
     $con=mysqli_connect("localhost","id7192357_bharat","12345","id7192357_bharat");
     echo "<h3>Hello  $fn</h3>";
?> 
    <form action="logout.php" method="post">
	<input class="button" type="submit" name="logout" value="logout">
	</form>
    
  </div>
</div>

<div class="split right">
  <div class="topp" id="scrollchatt">
      <?php
$sql=mysqli_query($con,"SELECT * FROM ( SELECT * FROM `message` ORDER BY msgid DESC LIMIT 20 ) sub ORDER BY msgid ASC;");
while($row=mysqli_fetch_array($sql))
{
	echo '<div ';
	if($_SESSION['uid']==$row['fromid']) echo 'class="mright">';
	else echo 'class="mleft">';
	$var=mysqli_query($con,"SELECT * FROM `users` where id=".$row['fromid'].";");
	$var=mysqli_fetch_array($var);
	echo $row['msg']."<br/>~by ".$var ['firstname'].'</div><div style="clear:both"></div>';
}
mysqli_close($con);

?>
  </div>
  <div class="bottomm">
  <form action="send.php" method="post">
	<input type="text" id="msg" name="msg" placeholder="Enter your Text">
	<input class="button1" type="submit" style="width:40%;"  value="send">
	</form>
  <div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script type="text/javascript">
function send_message()
{
    let mymsg=$('#msg')[0].value;
    console.log(mymsg);
    $.post('send.php',{msg:mymsg},function(data){
        console.log('done');
    })
    $('#msg')[0].value='';
}
$('#scrollchatt').scrollTop($('#scrollchatt')[0].scrollHeight);
</script>
</body>
</html> 
