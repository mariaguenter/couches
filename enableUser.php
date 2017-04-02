<?php
//set user to have admin privs
  if (!isset($_SESSION)) {
    session_start();
  }

  if (empty($_SESSION['admin'])) {
    header("Location: /home.php");
  }

	require 'connection.php';
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      $user = $_POST['user'];
      if($stat = $connection->query("update user set adminPriv = true where username = '$user'")){
				header('Location: /admin.php');
      }
				
				$connection->close();
		}
