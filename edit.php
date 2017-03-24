<?php
  $title = "Edit Profile";
  if (empty($_SESSION['username'])){
    header("Location: index.php");
  }
?>

<!DOCTYPE html>
<html>
  <?php require 'inc/head.inc.php'; ?>

  <body>
  <?php require 'inc/header.inc.php'; ?>
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
      <p>
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
      <p>
        <label class = "contactFields">picture:</label>
        <input type="file" name="profilePic" id="profilePicUpload" class="button" accept="image/*" />
      </p>
      <input type = "submit" value="submit"/>
    </form>
    <?php require 'inc/footer.inc.php'; ?>

  </body>
</html>