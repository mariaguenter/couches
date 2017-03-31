<?php $title = "error"; ?>

<!DOCTYPE html>
<html>

  <?php require 'inc/head.inc.php'; ?>

  <body>

    <?php include ('inc/header.inc.php'); 
	  if (isset($_SESSSION['username'])) {
		header('Location: home.php');
	  }

	   echo"<h1>old password is incorrect</h1>";
	   echo"<p><a href =\"edit.php\">return</a></p>";
	?>
	
	
	
	
	

	
	
	
	
	    <?php include ('inc/footer.inc.php'); ?>

  </body>
</html>