<?php
  if (!isset($_SESSION)) {
    session_start();
  }

	require 'connection.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if (isset($_POST['fname']) && isset($_POST['lname'])) {
			$fname = $connection->real_escape_string($_POST['fname']);
			$lname = $connection->real_escape_string($_POST['lname']);
			$user = $connection->real_escape_string($_SESSION['username']);

			$connection->query("update user set fname = '$fname', lname = '$lname' where username='$user'");
		}
	}	

	header("Location: profile.php");
