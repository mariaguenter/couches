<?php
  $title = "Edit Profile";
  if (empty($_SESSION['username'])){
    //header("Location: login.php");
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
    <form action="processChangePasswrod.php" method = "post" id = "createAccountForm">
      <h1>change password</h1>
        <label class = "contactFields">old password:</label>
        <input type="password" name="oldpassword" maxlength = "15" required />
		<br>
        <label class = "contactFields">new password:</label>
        <input type="password" name="newpassword" maxlength = "15" required />
		<br>
        <label class = "contactFields">confirm password:</label>
        <input type="password" name="confirmPassword" maxlength = "15"  required/>
		<br>
      <input type = "submit" value="submit"/>
    </form>
    <form action="processChangePic.php" method = "post" id = "createAccountForm">
      <h1>change profile picture</h1>
      <p>
        <label class = "contactFields">picture:</label>
        <input type="file" name="profilePic" id="profilePicUpload" class="button" accept="image/*" />
      </p>
      <input type = "submit" value="submit"/>
    </form>
    <?php require 'inc/footer.inc.php'; ?>

  </body>
</html>