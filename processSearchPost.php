<?php
  if (!isset($_SESSION)) {
    session_start();
  }

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
			if (isset($_POST['postTitle'])) {
				$title = htmlentities($_POST['postTitle']);
        $safe_title = $connection->real_escape_string($title);
				
				if ($stat = $connection->query("select post.postid, postDate, post.author, category, rating, title, post.content from post left join comments on post.postid = comments.postid where title like '%$safe_title%'")){
          while ($row = $stat->fetch_object()) {
            if ($row->postid == NULL) {
              continue;
            }
            $exists = True;
            $postid = $row->postid;
            $postDate = $row->postDate;
            $author = htmlspecialchars($row->author);
            $category = $row->category;
            $rating = $row->rating;
            $title = htmlspecialchars($row->title);
            $content = htmlspecialchars($row->content);
            echo "
			  <div id = \"Searchresults\">
              <h7>Title: $title</h7> <br>  
              <h7>Post ID: $postid <br>
              Post Date: $postDate <br>
              Author: $author <br>
              Content: $content <br>
              Category: $category <br>
              Rating: $rating </h7>
            
			</div>
            ";

            ?>
            <form method = "post" action = "deletePost.php" id="deletePost" onsubmit="return confirm('Are you sure you want to delete this post?');">
              <input type = "submit" value = "Delete Post" >
              <input type="hidden" name="postid" value="<?php print $postid; ?>">
            </form>
			<br>

          <?php

          }
				}

				if (!$exists) {
					echo"<h1>no results</h1>";
					echo"<p><a href =\"admin.php\">return</a></p>";
				}

				$connection->close();

			}
		}
		echo"<br><br><br><br>";
  include ('inc/footer.inc.php');
?>

		</body>
		</html>

