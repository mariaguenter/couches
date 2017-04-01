<?php
	require 'connection.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if (isset($_POST['fname']) && isset($_POST['lname'])) {
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$user = $_SESSION['username'];
			
			if($stat = $connection->prepare("update user set fname = ? and lname = ? where username=?" )){ 
				$stat->bind_param("sss", $fname, $lname, $user);
				$stat->execute();
					
			}
			$stat->close();
		}
	}	
	
	
	header("Location: cosc360.ok.ubc.ca/33354144/profile.php"); 