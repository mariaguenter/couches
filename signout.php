<?php
  $title = "Signout";

  if (!isset($_SESSION)) {
    session_start();
  }

  session_unset();
  session_destroy();
 
?>

<!DOCTYPE html>
<html>
  <?php require 'inc/head.inc.php'; ?>

  <body>
    <?php require 'inc/header.inc.php'; ?>
	<br>
    <h1>you are now signed out</h1>
	<p><a href = "login.php">login</a></p>
	</body>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php include 'inc/footer.inc.php'; ?>
  
</html>
