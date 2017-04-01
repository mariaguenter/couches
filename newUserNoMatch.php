<?php $title = "error"; ?>

<!DOCTYPE html>
<html>

  <?php require 'inc/head.inc.php'; ?>

  <body>

    <?php include ('inc/header.inc.php'); 
	  if (isset($_SESSSION['username'])) {
		header('Location: cosc360.ok.ubc.ca/33354144/home.php'); 
	  }

	   echo"<h1>password and confirm password dont match</h1>";
	   echo"<p><a href =\"login.php\">return</a></p>";
	?>
	
	
	
	
	

	
	
	
	
	    <?php include ('inc/footer.inc.php'); ?>

  </body>
</html>