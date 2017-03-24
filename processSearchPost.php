<?php 
	session_start();
	if($_SESSION['admin'] == False || isset($_SESSION['admin']) == False){
		header("Location: home.php");
	}
?>

<!DOCTYPE html>
<html>
  <head lang="en">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Playfair Display">
    <meta charset="utf-8">
    <title>Admin Controls</title>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="css/style.css" />
	<link rel="icon" href="images/thumbnail.png">
  </head>

  <body>
<?php

  require 'header.php';

	require 'connection.php';
		$exists = false;
		$postid = "Not Found";
		$postDate = "Not Found";
		$author = "Not Found";
		$category = "Not Found";
		$rating = "Not Found";
		$count = 0;
		$content  "Not Found";
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			if (isset($_POST['username'])) {
				$title = $_POST['postTitle'];

				
				if($stat = $connection->prepare("select post.postid, postDate, post.author, category, rating, title, post.content, count(comid) as numCom from post, comments where title like ? and post.postid = comments.postid group by post.postid, postDate, post.author, category, rating, title, post.content")){ 
				$title2 = "%".$title."%"; //NO IDEA IF THIS WORKS LOLOLOLOL
				$stat->bind_param("s", $title2);
				$stat->execute();
				$res = $stat->get_result();
				
			
				while ($row = $res->fetch_object()) {
					$postid = $row->postid;
					$postDate = $row->postDate;
					$author = $row->author;
					$category = $row->category;
					$rating = $row->rating;
					$count = $row->numCom;
					$content  $row->content;					
					break;
				}
				$stat->close();
				}

				//code on how to get the image (MAT??)

				$connection->close();

			}
		}
		
		echo "
		<fieldset>
			<legend>Title: $title </legend>
			Post ID: $postid <br>
			Post Date: $postDate <br>
			Author: $author <br>
			Content: $content <br>
			Category: $category <br>
			Rating: $rating <br>
			Number of Comments: $numCom <br>
		</fieldset>";
		
		//echo '<img src="data:image/'.$type.';base64,'.base64_encode($image).'"/>';   NEED TO CHANGE THIS

		if($exists == True){
		?>	

			<form method = "post" action = "deletePost.php" id="deltePost" >
				<input type = "submit" value = "Delete Post" > 
			</form>
			

			
<?php
			}
		}
  require 'footer.php';
?>

		</body>
		</html>

