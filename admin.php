<?php
	session_start();
	if($_SESSION['admin'] == False || isset($_SESSION['admin']) == False){
		header("Location: home.php");
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

<!--search users/enable or disable users/ edit/remove psots or users-->
<form method="post" action="processSearchUser.php" id="mainForm" >
  Search User:<br> <!--will display all users information from the table like lab9 then have enable/disable/delete buttons-->
  <input type="text" name="username" id="username" class="required">
  <br><br>
  <input type="submit" value="Find User">
</form>
<br><br><br>
<form method="post" action="processSearchPost.php" id="mainForm" >
  Search Post (by title):<br> <!--will display all info from the table and also have delete button-->
  <input type="text" name="username" id="username" class="required">
  <br><br>
  <input type="submit" value="Find Post">
</form>

</div>

<?php
  require 'footer.php';
?>

  </body>
</html>