<?php
//delete user from database then redirect to prev page
//eventually add pop up feature "are you sure"

	require 'connection.php';
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				$user = $GLOBAL['user'];
				if($stat = $connection->prepare("delete from user where username = ?")){ 
				$stat->bind_param("s", $user);
				$stat->execute();
				$stat->close();
				header('Location: ' . $_SERVER['HTTP_REFERER']);
				}
				
				$connection->close();

			
		}








