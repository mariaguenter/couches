<?php
  if (!isset($_SESSION)) {
	  session_start();
	}

  $title = "Search User";
  if (empty($_SESSION['admin'])) {
    header("Location: home.php"); 
  }
?>

<!DOCTYPE html>
<html>
  <?php require 'inc/head.inc.php'; ?>

  <body>
    <?php
			require 'inc/header.inc.php';
			require 'connection.php';
			
				echo"<h1>      All Posts:</h1>";
					if ($stat = $connection->query("select * from post")){

						while ($row = $stat->fetch_object()) {
							if ($row->postid == NULL) {
								break;
							}
							$postid = $row->postid;
							$postDate = $row->postDate;
							$author = htmlspecialchars($row->author);
							$category = $row->category;
							$rating = $row->rating;
							$title = htmlspecialchars($row->title);
							$content = htmlspecialchars($row->content);
							echo "
							<br>
							<p>
							  Title: $title <br>
							  Post ID: $postid <br>
							  Post Date: $postDate <br>
							  Author: $author <br>
							  Content: $content <br>
							  Category: $category <br>
							  Rating: $rating <br>
							</p>
							<br>
							";

							
						}
						$stat->close();
					}

					$connection->close();
				
						
			
			
			

  include ('inc/footer.inc.php');
?>

		</body>
		</html>