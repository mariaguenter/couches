<!DOCTYPE html>
<html>
  <head lang="en">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Playfair Display">
    <meta charset="utf-8">
    <title>Contact US</title>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="css/style.css" />
	<link rel="icon" href="images/thumbnail.png">
  </head>

  <body>
<?php
  include ('header.php');
?>

    <div id="parent">
      <div id="contactMain">
        <form action="" method = "post" id = "contactForm">
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

<?php
  include ('footer.php');
?>

  </body>
</html>