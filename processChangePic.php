<?php
	require 'connection.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if (isset($_POST['profilePic'])) {
			$pic = $_POST['profilePic'];
			$user = $_SESSION['username'];
			
			//magic to change the profile picture
					
		
		}
	}	
	
	
	header("Location: profile.php");