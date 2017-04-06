<?php	
	require 'connection.php';
	$id = $_GET['id'];
	$sql2 = "SELECT * FROM comments WHERE postid = " . $id;
    $stat = $connection->query($sql2);
    
	while($row = $stat->fetch_assoc()){

		$commentAuthor = htmlspecialchars($row['author']);
		$commentContent = $row['content'];
		
		echo "
			<h6><a href=\"profile.php?user=$commentAuthor\">" . $commentAuthor . "</a></h6>
			<p>" . $commentContent . "</p>
			
		";
			
	}