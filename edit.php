<!DOCTYPE html>
<html>
<?php
  include ('head.php');
?>

  <body>
<?php
  include ('header.php');
?>
<!-- No idea if this page works, havent looked at it in browser, gotta go to class now-->
	<form action="" method = "post" id = "createAccountForm">
          <legend>change email</legend>
          <p>
            <label class = "contactFields">change email:</label>
            <input type="email" name="email" required/>
          </p>
		<input type = "submit" value="edit profileEmail"/>
        </form>
	<form action="" method = "post" id = "createAccountForm">
          <legend>change password</legend>
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
		<input type = "submit" value="edit profilePass"/>
        </form>
	<form action="" method = "post" id = "createAccountForm">
          <legend>change profile picture</legend>
            <label class = "contactFields">picture:</label>
            <input type="file" name="profilePic" id="profilePicUpload" class="button" accept="image/*" />
          </p>
          <input type = "submit" value="edit profilePic"/>
        </form>
<?php
  include ('footer.php');
?>

  </body>
</html>