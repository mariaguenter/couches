<?php
//set user to have admin privs

	require 'connection.php';
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				$user = $_POST['user'];
				if($stat = $connection->prepare("update user set adminPriv = true where username = ?")){ 
				$stat->bind_param("s", $user);
				$stat->execute();
				$stat->close();
				header('Location: ' . $_SERVER['HTTP_REFERER']); //change maybe?
				}
				
				$connection->close();

			
		}








