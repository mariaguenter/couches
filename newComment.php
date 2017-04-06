<?php

	require 'connection.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if (isset($_POST['comment'])) { 
			$content = $connection->real_escape_string(htmlspecialchars($_POST['comment']));
			$postid = $_POST['id'];
			$username = $connection->real_escape_string($_POST['username']);

      $connection->query("insert into comments(content, author, postid) values ('$content','$username',$postid)");

			$connection->close();
			header("Location: post.php?id=$postid");
		}
	}




