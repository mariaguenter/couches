<?php

	require 'connection.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if (isset($_POST['comment'])) { 
			$content = $_POST['comment'];
			$postid = $_POST['id'];
			$username = $_POST['username']; 

			if($stat = $connection->prepare("insert into comments(content, author, postid) values (?,?,?)") ) {
				$stat->bind_param("ssi", $content, $username, $postid);
				$stat->execute();
				$stat->close();
			}

			$connection->close();
			header("Location: post.php?id=$postid");
		}
	}




