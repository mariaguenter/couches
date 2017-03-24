<?php
//delete post from database then redirect to prev page

	require 'connection.php';
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				$postid = $GLOBAL['postid'];
				if($stat = $connection->prepare("delete from post where postid = ?")){ 
				$stat->bind_param("s", $postid);
				$stat->execute();
				$stat->close();
				header('Location: ' . $_SERVER['HTTP_REFERER']);
				}

				$connection->close();

			
		}








