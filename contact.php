<?php $title = "Contact Us"; ?>

<!DOCTYPE html>
<html>
  <?php require 'inc/head.inc.php'; ?>

  <body>

    <?php require 'inc/header.inc.php'; ?>

    <div id="parent">
      <div id="contactMain">
        <form action="processContact.php" method = "post" id = "contactForm">
          <legend>Contact Us</legend>
          <p>
            <label class="contactFields">Email:</label>
            <input type="email" name="email" required/>
          </p>
          <p>
            <label class="contactFields">Name:</label>
            <input type="text" name="name" required/>
          </p>
          <p>
            <label class="contactFields">Subject:</label>
            <input type="text" name="subject" required/>
          </p>
          <p>
            <label class="contactFields">Message:</label>
            <textarea name="message" required></textarea>
          </p>
          <input type = "submit"/>
        </form>
      </div>
    </div>

    <?php require 'inc/footer.inc.php'; ?>

  </body>
</html>
