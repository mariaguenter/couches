<?php


	
	require 'connection.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if (isset($_POST['np-title']) && isset($_POST['np-content'])  && isset($_POST['category'])  && isset($_POST['np-image']) ) { //dont know if catgory name thing is correct
			$content = $_POST['comment'];
			$postid = //somehow get this?!?!?
			$username = $_SESSION['username']; 
				
			

	
				if($stat = $connection->prepare("insert into comments(content, author, postid) values (?,?,?)") ){
					$stat->bind_param("sss", $content, $username, $postid);
					$stat->execute();
					$stat->close();
				
					

					
			
			$connection->close();
			header("Location: ") //take to page for that post, idk what the link is for this tho
		}
	}
	
	
?>



