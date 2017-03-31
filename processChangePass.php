<?php
	require 'connection.php';
	$exists = false;
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if (isset($_POST['oldpassword']) && isset($_POST['newpassword']) && isset($_POST['confirmpassword']) ){
			$new = $_POST['newpassword'];
			$old = $_POST['oldpassword'];
			$new2 = $_POST['confirmpassword'];
			$user = $_SESSION['username'];

			if($stat = $connection->prepare("select * from user where username=? and password = ?")){ 
				$old = md5($old);
				$stat->bind_param("ss", $user, $old);
				$stat->execute();
				$res = $stat->get_result();
			

				while ($row = $res->fetch_assoc()) {
					$exists = true;
					break;
				}
				
				$stat->close();
				
				if($exists){	
					if($new == $new2){				
						if($stat = $connection->prepare("update user set password = ? where username=?" )){ 
							$pass = md5($new);
							$stat->bind_param("ss", $pass, $user);
							$stat->execute();	
						}
					}else{
						header("Location: noMatch.php");
					}	
				}else{
					header("Location: badPass.php");
				}
			
				$stat->close();
				
			}
			
			
			
		
		}
	}	
	
	
	header("Location: profile.php");