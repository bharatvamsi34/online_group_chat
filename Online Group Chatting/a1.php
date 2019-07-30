
<?php
  if (isset($_POST['submit'])) {
    $example = $_POST['email'];
    //$example2 = $_POST['example2'];
    echo $example;
  }
?>
<form action="a1.php" method="post">
  <input type="text" id="email" name="email" placeholder="Enter Valid EmailId"><br><br>
  <input class="button button-block" type="submit" name="submit" value="Send OTP">
  <input name="submit" type="submit" />
</form>