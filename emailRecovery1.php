<?php $title = "Password Recovery"; ?>

<!DOCTYPE html>
<html>

  <?php require 'inc/head.inc.php';
	require 'connection.php';  ?>

  <body>

    <?php include ('inc/header.inc.php');
		 
		if(isset($_REQUEST['email'])) {
			$email_to = $_REQUEST['email'];
			
			if ($stat = $connection->query("select * from user where email='$email_to'")) {
			if ($row = $stat->fetch_assoc()) {
				$exists = true;
				//get password stuff and send
				$pass = md5("password1");
				$sql = "UPDATE user SET pass = '$pass' WHERE email='$email_to'";
				$connection->query($sql);
				$email_from = "kitty.threads.contact@gmail.com";
				
				$subject = "Temp Password";
				$comment = "Your password has been temporarily set to password1.";

				mail($email_to, "$subject", $comment, "From:" . $email_from);
				
			
				
				
			  echo "<h1>	An email will be sent shortly</h1>
			  <p><a href =\"home.php\">home</a></p>
				<br><br><br><br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br><br><br><br>";
			  $connection->close();
			  
			
			}else{ //if not email:
				echo"<h1>email does not exist</h1>";
				echo"<p><a href =\"emailRecovery1.php\">return</a></p>
					<br><br><br><br><br><br><br><br>
					<br><br><br><br><br><br><br><br><br><br>";
			  }
			}
		}
			else {
			
			
		
			
			
		
	?>
	      <form method = "post" id = "emailRecov">
          <legend>password recovery</legend>
          <p>
            <label class = "contactFields">email:</label>
            <input type="email" name="email" required />
          </p>
          <input type = "submit" value="submit" required/>
        </form>
		<br><br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br><br><br>
	
	
	    <?php 
			}
		
		include ('inc/footer.inc.php'); ?>

  </body>
</html>
