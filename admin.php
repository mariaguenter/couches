<?php
  if (!isset($_SESSION)) {
    session_start();
  }

  $title = "Admin Controls";
  if (empty($_SESSION['admin'])) {
    header("Location: index.php");
  }
?>

<!DOCTYPE html>
<html>
  <?php require 'inc/head.inc.php'; ?>

  <body>
    <?php require 'inc/header.inc.php'; ?>

    <!--search users/enable or disable users and remove psots or users-->
    <form method="post" action="processSearchUser.php" id="mainForm" >
      Search User (by exact email or username):<br> <!--will display all users information from the table like lab9 then have enable/disable/delete buttons-->
      <input type="text" name="username" id="username" class="required">
      <br><br>
      <input type="submit" value="Find User">
    </form>
    <br><br>
    <form method="post" action="processSearchPost.php" id="mainForm" >
      Search Post (by title):<br> <!--will display all info from the table and also have delete button-->
      <input type="text" name="postTitle" id="postTitle" class="required">
      <br><br>
      <input type="submit" value="Find Post">
    </form>
	<br><br>
	<form action="processMonthly.php" method = "post" id = "createAccountForm" enctype="multipart/form-data">
      usage report: <br> 
	  <p>
      <input type = "submit" value="request report"/>
	  </p>
    </form>
	<br><br>
	<form action="processAllUsers.php" method = "post" id = "createAccountForm" enctype="multipart/form-data">
      all users: 
	  <p>
      <input type = "submit" value="submit"/>
	  </p>
    </form>
	<br><br>
	<form action="processAllPosts.php" method = "post" id = "createAccountForm" enctype="multipart/form-data">
      all posts:  
	  <p>
      <input type = "submit" value="submit"/>
	  </p>
    </form>	
	<br><br><br><br><br>
    <?php require 'inc/footer.inc.php'; ?>

  </body>
</html>
