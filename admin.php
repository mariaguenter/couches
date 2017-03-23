<?php
	session_start();
	if($_SESSION['admin'] == False || isset($_SESSION['admin']) == False){
		header("Location: home.html");
	}
?>


<!DOCTYPE html>
<html>
  <head lang="en">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Playfair Display">
    <meta charset="utf-8">
    <title>Admin Controls</title>
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

<h1>search users/enable or disable users/ edit/remove psots or users - marai will finish this later lololol</h1>

<?php
  require 'footer.php';
?>

  </body>
</html>