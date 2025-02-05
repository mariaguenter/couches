<?php
  if (!isset($_SESSION)) {
    session_start();
  }

  $title = "Edit Profile";
  if (empty($_SESSION['username'])){
    header("Location: login.php"); 
  }
?>

<!DOCTYPE html>
<html>
  <?php require 'inc/head.inc.php'; ?>

  <body>
  <?php require 'inc/header.inc.php'; ?>
    <form action="processChangeName.php" method = "post" id = "createAccountForm"> 
      <h1>change name</h1>
      <p>
        <label class = "contactFields">first name:</label>
        <input type="text" name="fname" maxlength = "30" required/>
		<br>
        <label class = "contactFields">last name:</label>
        <input type="text" name="lname" maxlength = "30" required/>		
      </p>
      <input type = "submit" value = "submit"/>
    </form>
    <form action="processChangePass.php" method = "post" id = "createAccountForm">
      <h1>change password</h1>
        <label class = "contactFields">old password:</label>
        <input type="password" name="oldpassword" maxlength = "15" required />
		<br>
        <label class = "contactFields">new password: <a  target="_blank" title="Currently debugging javascript. Please use password1 as your password."><img src="images/questionmark.png" height="14px"/></a></label>
        <input type="password" name="newpassword" maxlength = "15" required />
		<br>
        <label class = "contactFields">confirm password:</label>
        <input type="password" name="confirmPassword" maxlength = "15"  required/>
		<br>
      <input type = "submit" value="submit"/>
    </form>
    <form action="processChangePic.php" method = "post" id = "createAccountForm" enctype="multipart/form-data">
      <h1>change profile picture</h1>
      <p>
        <label class = "contactFieldsPic">picture:</label>
        <input type="file" name="profilePic" id="profilePicUpload" class="button" accept="image/*" />
      </p>
      <input type = "submit" value="submit"/>
    </form>
	<br><br><br>

    <?php require 'inc/footer.inc.php'; ?>

  </body>
</html>