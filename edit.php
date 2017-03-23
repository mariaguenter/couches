<?php
	session_start();
	if(isset($_SESSION['username']) == False){
		header("Location: home.php");
	}
?>

<!DOCTYPE html>
<html>
  <head lang="en">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Playfair Display">
    <meta charset="utf-8">
    <title>Edit Profile</title>
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
<!-- No idea if this page works, havent looked at it in browser, gotta go to class now-->
	<form action="" method = "post" id = "createAccountForm">
          <h1>change email</h1>
          <p>
            <label class = "contactFields">change email:</label>
            <input type="email" name="email" required/>
          </p>
		<input type = "submit" value = "submit"/>
        </form>
	<form action="" method = "post" id = "createAccountForm">
          <h1>change password</h1>
          <p>
            <label class = "contactFields">old password:</label>
            <input type="password" name="password"required />
          </p>
		    <label class = "contactFields">new password:</label>
            <input type="password" name="password"required />
          </p>
          <p>
            <label class = "contactFields">confirm password:</label>
            <input type="password" name="confirmPassword" required/>
          </p>
		<input type = "submit" value="submit"/>
        </form>
	<form action="" method = "post" id = "createAccountForm">
          <h1>change profile picture</h1>
            <label class = "contactFields">picture:</label>
            <input type="file" name="profilePic" id="profilePicUpload" class="button" accept="image/*" />
          </p>
          <input type = "submit" value="submit"/>
        </form>
<?php
  require 'footer.php';
?>

  </body>
</html>