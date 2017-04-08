<?php $title = "Contact Us"; ?>

<!DOCTYPE html>
<html>
  <?php require 'inc/head.inc.php'; ?>

  <body>

    <?php require 'inc/header.inc.php'; 
	
	if(isset($_REQUEST['email'])) {
		$admin_email = "kitty.threads.contact@gmail.com";
		$email = $_REQUEST['email'];
		$subject = $_REQUEST['subject'];
		$comment = $_REQUEST['message'];
		$name = $_REQUEST['name'];
		
		mail($admin_email, "$subject", $comment, "From:" . $email);
		
		echo"
			<br>
		    <h1>Thank you for your message, we will get back to you soon!</h1>
			<p><a href = \"home.php\">Return to home</a></p>
			<br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
		
	}
	
	else { 
	
	
	?>

    <div id="parent">
      <div id="contactMain">
        <form method = "post" id = "contactForm">
          <legend>Contact Us</legend>
          <p>
            <label class="contactFields">Email:</label>
            <input type="email" name="email" maxlength = "50" required/>
          </p>
          <p>
            <label class="contactFields">Name:</label>
            <input type="text" name="name" maxlength = "50"  required/>
          </p>
          <p>
            <label class="contactFields">Subject:</label>
            <input type="text" name="subject" maxlength = "30" required/>
          </p>
          <p>
            <label class="contactFields">Message:</label>
            <textarea name="message" maxlength = "250"  required></textarea>
          </p>
          <input type = "submit"/>
        </form>
      </div>
    </div>
	<br><br><br><br><br><br><br>
    <?php 
	}
	require 'inc/footer.inc.php'; ?>

  </body>
</html>
