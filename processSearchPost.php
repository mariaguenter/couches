<?php
  $title = "Search Posts";
  if (empty($_SESSION['admin'])) {
    header("Location: home.php");
  }
?>

<!DOCTYPE html>
<html>
  <?php require 'inc/head.inc.php'; ?>

  <body>
    <?php require 'inc/header.inc.php'; 

	require 'connection.php';
		$exists = false;
		$postid = "Not Found";
		$postDate = "Not Found";
		$author = "Not Found";
		$category = "Not Found";
		$rating = "Not Found";
		$count = 0;
		$content =  "Not Found";
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			if (isset($_POST['username'])) {
				$title = $_POST['postTitle'];

				
				if($stat = $connection->prepare("select post.postid, postDate, post.author, category, rating, title, post.content, count(comid) as numCom from post, comments where title like ? and post.postid = comments.postid group by post.postid, postDate, post.author, category, rating, title, post.content")){ 
				$title2 = "%".$title."%"; //NO IDEA IF THIS WORKS LOLOLOLOL
				$stat->bind_param("s", $title2);
				$stat->execute();
				$res = $stat->get_result();
				
			
				while ($row = $res->fetch_object()) { //prints out all posts that the search returns lolol this may be a bad idea
					$exists = True;
					$postid = $row->postid;
					$postDate = $row->postDate;
					$author = $row->author;
					$category = $row->category;
					$rating = $row->rating;
					$count = $row->numCom;
					$content = $row->content;	
					//code on how to get the image (MAT??)					
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
					</fieldset>
					<br><br>";
					
					//echo '<img src="data:image/'.$type.';base64,'.base64_encode($image).'"/>';   NEED TO CHANGE THIS
			
					$GLOBALS['postid'] = $postid;
					?>	
					<form method = "post" action = "deletePost.php" id="deltePost" >
						<input type = "submit" value = "Delete Post" > 
					</form>
						

				<?php		
					
				}
				$stat->close();
				}
				while(!$exists){
					echo"<h1>no results</h1>";
					echo"<p><a href =\"admin.php\">return</a></p>";
				}

			

				$connection->close();

			}
		}
  require 'footer.php';
?>

		</body>
		</html>

