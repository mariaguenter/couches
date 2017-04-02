<?php
  if (!isset($_SESSION)) {
    session_start();
  }

  if (empty($_SESSION['admin'])) {
    header("Location: /home.php");
  }

	require 'connection.php';
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				$postid = $_POST['postid'];
				if($stat = $connection->query("delete from post where postid = $postid")){

				  header('Location: /admin.php');
				}

				$connection->close();
		}








