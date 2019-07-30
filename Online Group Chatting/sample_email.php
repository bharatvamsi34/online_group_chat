<?php
// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);
//$m=mt_rand(10,100);

// send email
mail("ch.bv99@gmail.com","My subject",mt_rand(100,1000));
echo "Success";
?>