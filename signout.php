<!DOCTYPE html>
<html>
  <head lang="en">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Playfair Display">
    <meta charset="utf-8">
    <title>Signout</title>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="css/style.css" />
	<link rel="icon" href="images/thumbnail.png">
  </head>

  <body>
<?php
  unset($_SESSION['username']);
  unset($_SESION['admin']);
  require 'header.php';
?>

<h1>you are now signed out</h1>

<?php
  include 'footer.php';
?>

 </body>
</html>