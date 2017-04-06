<?php

	if (isset($_GET['id'])) {
    $id = preg_replace('/\D/s', '', htmlspecialchars($_GET['id']));
  }
  if (empty($id)) {
    header("Location: home.php");
  }
  else{
    require 'connection.php';

    $sql = "SELECT rating FROM post WHERE postid = $id";
	$stat = $connection->query($sql);
    $row = $stat->fetch_assoc();
	
	$rating = $row['rating'];
	$rating = $rating + 1;
	
	$sql2 = "UPDATE post SET rating = $rating WHERE postid = $id";
	$stat2 = $connection->query($sql2);
    
	$connection->close();
	
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	
  }





