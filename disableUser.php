<?php
//set user to not have admin privs

	require 'connection.php';
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				$user = $GLOBAL['user'];
				if($stat = $connection->prepare("update user set adminPriv = false where username = ?")){ 
				$stat->bind_param("s", $user);
				$stat->execute();
				$stat->close();
				header('Location: ' . $_SERVER['HTTP_REFERER']); //chagne maybe?
				}
				
				$connection->close();

			
		}



