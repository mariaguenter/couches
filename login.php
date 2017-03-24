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
            <input type="text" name="username" required />
          </p>
          <p>
            <label class = "contactFields">password:</label>
            <input type="password" name="password" />
          </p>
          <input type = "submit" value="login" required/>
        </form>

        <p id="forgot">
          <a href="#">forgot your password?</a>
        </p>
        <br/>

        <form action="" method = "post" id = "createAccountForm">
          <legend>create an account</legend>
          <p>
            <label class = "contactFields">first name</label>
            <input type="text" name="fname" required />
          </p>
          <p>
            <label class = "contactFields">last name</label>
            <input type="text" name="lname" required/>
          </p>
          <p>
            <label class = "contactFields">email:</label>
            <input type="email" name="email" required/>
          </p>
          <p>
            <label class = "contactFields">username:</label>
            <input type="text" name="username" required/>
          </p>
          <p>
            <label class = "contactFields">password:</label>
            <input type="password" name="password"required />
          </p>
          <p>
            <label class = "contactFields">confirm password:</label>
            <input type="password" name="confirmPassword" required/>
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
            <input type="text" name="answer" required/>
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
