<?php $title = "Login"; ?>

<!DOCTYPE html>
<html>

  <?php require 'inc/head.inc.php'; ?>

  <body>

    <?php include ('inc/header.inc.php'); ?>

    <div id="parent">
      <div id="contactMain">

        <form action="processlogin.php" method = "post" id = "loginForm">
          <legend>login</legend>
          <p>
            <label class = "contactFields">username:</label>
            <input type="text" name="username" maxlength = "30" required />
          </p>
          <p>
            <label class = "contactFields">password:</label>
            <input type="password" name="password" maxlength = "15" required/>
          </p>
          <input type = "submit" value="login" />
        </form>

        <p id="forgot">
          <a href="emailRecovery1.php">forgot your password?</a>
        </p>
        <br/>

        <form action="newUser.php" method = "post" id = "createAccountForm" enctype="multipart/form-data">
          <legend>create an account</legend>
          <p>
            <label class = "contactFields">first name</label>
            <input type="text" name="firstname" maxlength = "30" required />
          </p>
          <p>
            <label class = "contactFields">last name</label>
            <input type="text" name="lastname" maxlength = "30" required/>
          </p>
          <p>
            <label class = "contactFields">email:</label>
            <input type="email" name="email" maxlength = "50" required/>
          </p>
          <p>
            <label class = "contactFields">username:</label>
            <input type="text" name="username" maxlength = "30"  required/>
          </p>
          <p>
            <label class = "contactFields">password:</label>
            <input type="password" name="password" maxlength = "15" placeholder="7-15 chars, min 1 number" required />
          </p>
          <p>
            <label class = "contactFields">confirm password:</label>
            <input type="password" name="confirmPassword" maxlength = "15"  required/>
          </p>
          <p>
            <label class = "contactFields">security question:</label>
            <select name="question" required>
              <option value = "breed">What is the breed of your current cat?</option>
              <option value = "name">What was your first cat's name?</option>
              <option value = "sum">How many cats have you owned?</option>
              <option value = "artist">If you could name your cat after a celebrity, who would it be?</option>
            </select>
          </p>
          <p>
            <label class = "contactFields">answer:</label>
            <input type="text" name="answer" maxlength = "30"  required/>
          </p>
          <p>
            <label class = "contactFields">picture:</label>
            <input type="file" name="profilePic" id="profilePicUpload" class="button" accept="image/*" />
          </p>
          <input type = "submit" value="create account"/>
        </form>

      </div>
    </div>

    <?php include ('inc/footer.inc.php'); ?>

  </body>
</html>
