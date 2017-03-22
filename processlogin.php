<!-- stolen from lab 9 need to modify potentially -->

<?php
	session_start();
	if(isset($_SESSSION['username'])){
		header('Location: home.php');
	}	
	
	require 'connection.php';
	$exists = false;
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if (isset($_POST['username']) && isset($_POST['password'])) {
			$user = $_POST['username'];
			$pass = $_POST['password'];
			
			
			if($stat = $connection->prepare("select * from users where username=? and password=?")){ 
			$pass2 = md5($pass);
			$stat->bind_param("ss", $user, $pass2);
			$stat->execute();
			$res = $stat->get_result();
			
		
			while ($row = $res->fetch_assoc()) {
				$exists = true;
				$_SESSION['username'] = $user;
				if ($admin == 1){   //yes or no  (0 or 1)value we need to get from database
					$_SESSION['admin'] = $admin; 
				}
				header('Location: home.php');
				
				break;
			}
			$stat->close();
			}
			
			if($exists == false){
				header('Location: login.php');
				}
			}else{
				//header('Location: login.php'); ???
			}
			
			
			$connection->close();

		}else{
			//header('Location: login.php'); ???
		}
	
	
	
?>