<?php $title = "Password Recovery"; ?>

<!DOCTYPE html>
<html>

  <?php require 'inc/head.inc.php'; ?>

  <body>

    <?php include ('inc/header.inc.php'); 
	  if (isset($_SESSSION['username'])) {
		header('Location: cosc360.ok.ubc.ca/33354144/home.php');
	  }

	  require 'connection.php';
	  $exists = FALSE;
	  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['username'])) {
		  $user = $_POST['username'];
      $safe_user = $connection->real_escape_string($user);
		
		if ($stat = $connection->query("select * from users where username='$safe_user'")) {
        while ($row = $stat->fetch_assoc()) {
          $exists = true;
          $_SESSION['username'] = $user;
		  echo "<h1>	An email will be sent shortly</h1>";
		  //ADD STUFF HERE FOR EMAIL STUFF LATER
          break;
        }
      }

      if (!$exists) {
        echo"<h1>username does not exist</h1>";
		echo"<p><a href =\"emailRecovery1.php\">return</a></p>";
      }

    $connection->close();
	 }
	 }
	?>
	
	
	

	
	
	
	
	    <?php include ('inc/footer.inc.php'); ?>

  </body>
</html>
