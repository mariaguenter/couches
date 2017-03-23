<?php
//code to change if loggin in or not
	session_start();
	if(isset($_SESSION['username'])){
?>
<!-- use if logged in -->
    <footer>
      <div class="footer-section">
        <p>
          <a href="home.php">home</a>  | <a href="profile.php">profile</a>| <a href="#">search</a>  | <a href="signout.php">signout</a>  | <a href="contact.php">contact</a>
        </p>
        <i><small>© 2017 Maria Guenter & Ozzy the cat</small></i>
      </div>
    </footer>
	
<?php 
	} else { 
?>

<!-- use if not logged in -->
    <footer>
      <div class="footer-section">
        <p>
          <a href="home.php">home</a>  | <a href="login.php">profile</a>| <a href="#">search</a>  | <a href="login.php">login</a>  | <a href="contact.php">contact</a>
        </p>
        <i><small>© 2017 Maria Guenter & Ozzy the cat</small></i>
      </div>
    </footer>
	
	
	<?php } ?>
