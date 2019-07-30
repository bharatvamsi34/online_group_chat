<?php
$dbname='id7192357_bharat';
$dbuser='id7192357_bharat';
$host='localhost';
$dbpass='12345';
$dbcon=mysqli($host,$dbuser,$dbpass,$dbname);
if(isset($_GET['submit']))
{
    $a=$_GET['uname'];
    //s$b=$_GET['password'];

    echo $a;
}

?>

<form action="index.php" method="get">
<input type="text" name="uname">
<input type="submit" value="submit" name="submit">
</form>