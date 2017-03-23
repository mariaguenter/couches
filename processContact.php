<?php
	session_start();
?>

<!DOCTYPE html>
<html>
  <head lang="en">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Playfair Display">
    <meta charset="utf-8">
    <title>Contact Us</title>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="css/style.css" />
	<link rel="icon" href="images/thumbnail.png">
  </head>

  <body>
  
<?php
	require 'header.php';
?>

    <h1>Thank you for your message, we will get back to you soon!</h1>
	<p><a href = "home.php">Return to home</a></p>
	
<?php	
		require 'footer.php';
?>
  </body>
</html>  

<!--witch craft to make it send an email -->