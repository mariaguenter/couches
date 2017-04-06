<?php
//delete user from database then redirect to prev page
//eventually add pop up feature "are you sure"

  if (!isset($_SESSION)) {
    session_start();
  }

  if (empty($_SESSION['admin'])) {
    header("Location: home.php");
  }

	require 'connection.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	  $user = $_POST['user'];
	
	  $query = "DELETE FROM comments WHERE postid in ("
	    .        "SELECT postid FROM post WHERE author = '$user') "
		.      "OR author = '$user'";
	  if (!$stat = $connection->query($query)) {
		  die($connection->error);
	  }
      if (!$stat=$connection->query("delete from post where author = '$user'")) {
		die($connection->error);
	  }
	  if (!$stat = $connection->query("delete from user where username = '$user'")) {
		  die($connection->error);
	  }
	  header('Location: admin.php');	
     	
      $connection->close();
	}
