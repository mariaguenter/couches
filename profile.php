<?php
  $title = "Profile";

  //if (empty($_SESSION['username'])) {
   // header("Location: login.php");
  //}
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
				<article id=\"centerProfile\">
				  <div id=\"profileEntry\">
					<figure>
					  <img src=\"images/blank.jpg\" alt=\"profile picture\" /><!-- MAGIC INSERTED HERE also eventually make open in pop up-->
					</figure>
					<div>
					  <h3>"$fname . " " . $lname</h3>
					  <p id=\"edit\"><a href = \"edit.php\">edit</a></p>
					</div>
				  </div>
				  <br/>

				  <h4>Posts</h4>
				  <div id=\"posts\">
					<div class=\"postEntry\">
					  <figure>
						<img src=\"images/blank.jpg\" alt=\"\" /> 
					  </figure>
					  <div>
						<h2 id = \"third\"><a href =\"#\">Thread Title</a></h2>
						<p><a href=\"#\">author</a>    |        date/time</p>
						<p class=\"comments\">nummber of comments</p>
					  </div>
					</div>
				  </div>
				"
				
			}
		}
			
  

    $connection->close();

		
		
	?>
    <article id="centerProfile">
      <div id="profileEntry">
        <figure>
          <img src="images/blank.jpg" alt="profile picture" /><!-- eventually make open in pop up-->
        </figure>
        <div>
          <h3>Firstname Lastname</h3>
          <p id="edit"><a href = "edit.php">edit</a></p>
        </div>
      </div>
      <br/>

      <h4>Posts</h4>
      <div id="posts">
        <div class="postEntry">
          <figure>
            <img src="images/blank.jpg" alt="" /> 
          </figure>
          <div>
            <h2 id = "third"><a href ="#">Thread Title</a></h2>
            <p><a href="#">author</a>    |        date/time</p>
            <p class="comments">nummber of comments</p>
          </div>
        </div>
      </div>

    </article>

    <?php include ('inc/footer.inc.php'); ?>

  </body>
</html>
