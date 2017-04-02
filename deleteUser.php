<?php
//delete user from database then redirect to prev page
//eventually add pop up feature "are you sure"

  if (!isset($_SESSION)) {
    session_start();
  }

  if (empty($_SESSION['admin'])) {
    header("Location: /home.php");
  }

	require 'connection.php';
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      $user = $_POST['user'];
      if($stat = $connection->query("delete from user where username = '$user'")){

				header('Location: /admin.php');
      }
				
      $connection->close();
		}
