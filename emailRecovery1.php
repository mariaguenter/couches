<?php $title = "Password Recovery"; ?>

<!DOCTYPE html>
<html>

  <?php require 'inc/head.inc.php'; ?>

  <body>

    <?php include ('inc/header.inc.php'); ?>
	
	
	      <form action="emailRecovery2.php" method = "post" id = "emailRecov">
          <legend>password recovery</legend>
          <p>
            <label class = "contactFields">username:</label>
            <input type="text" name="username" required />
          </p>
          <input type = "submit" value="submit" required/>
        </form>
		<br><br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br><br><br>
	
	
	    <?php include ('inc/footer.inc.php'); ?>

  </body>
</html>
