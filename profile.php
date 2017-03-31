<?php
  $title = "Profile";

  if (empty($_SESSION['username'])) {
    header("Location: login.php"); //change
  }
?>

<!DOCTYPE html>
<html>
  <?php require 'inc/head.inc.php'; ?>

  <body>

    <?php require 'inc/header.inc.php'; 
		require 'connection.php';
		$user = $_SESSION['username'];
		
		if ($stat = $connection->prepare("select * from user where username = ?")) {
			$stat->bind_param("s", $user);
			$stat->execute();
			$res = $stat->get_result();

			while ($row = $res->fetch_assoc()) {
				$fname = $row->fname;
				$lname = $row->lname;
				//$pic = ???? magic
			}
			echo"
				<article id=\"centerProfile\">
				  <div id=\"profileEntry\">
					<figure>
					  <img src=\"images/blank.jpg\" alt=\"profile picture\" /><!-- MAGIC INSERTED HERE also eventually make open in pop up-->
					</figure>
					<div>
					  <h3>" . $fname . " " . $lname . "</h3>
					  <p id=\"edit\"><a href = \"edit.php\">edit</a></p>
					</div>
				  </div>
				  <br/>

				  <h4>Posts</h4>
				  <div id=\"posts\">";
			$stat->close();
		}
		if($stat = $connection->prepare("select post.postid, post.postDate, post.pic, post.title, sum(comid) as numCom from post, comments where post.author = ? and post.postid = comments.postid group by post.postid, post.postDate, post.pic, post.title limit 20")) {
			$stat->bind_param("s", $user);
			$stat->execute();
			$res = $stat->get_result();
			
			while($row = $res->fetch_assoc()){
				//$postPic = ?? magic
				$date = $row->postDate;
				$title = $row->$title;
				$numComments = $row->numCom;
				echo"
					<div class=\"postEntry\">
					  <figure>
						<img src=\"images/blank.jpg\" alt=\"\" />  <!--PICTURE MAGIC -->
					  </figure>
					  <div>
						<h2 id = \"first\"><a href =\"#\">" . $title . "</a></h2> <!--LINK TO POST PAGE NOT SURE HOW TO DO YET -->
						<p>" . $date . "</p>
						<p class=\"comments\">" . $numComments . " comments</p>
					  </div>
					</div>
				 
				";
				
			}
			echo "
			 </div>
			</article>";
		}
			
  

    $connection->close();

		
		
	?>


   

    <?php include ('inc/footer.inc.php'); ?>

  </body>
</html>
