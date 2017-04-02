<?php
  if (empty($_SESSION)) {
    session_start();
  }
  $title = "Post";
?>

<!DOCTYPE html>
<html>

  <?php require 'inc/head.inc.php'; ?>

  <body>

<?php
	
  require 'inc/header.inc.php';

  if (isset($_GET['id'])) {
    $id = preg_replace('/\D/s', '', htmlspecialchars($_GET['id']));
  }
  if (empty($id)) {
    if (isset($_SESSION['username'])) { ?>
      <form id="side-bar-new-post" method="post" action="newPost.php" enctype="multipart/form-data">
        <div class="form-row">
          <label for="np-title" class="top">Title: </label>
          <input id="np-title" name="np-title" type="text" maxlength="30" required/>
        </div>
        <div class="form-row">
          <label for="np-content" class="top">Content: </label>
          <textarea id="np-content" name="np-content" placeholder="max 800 characters" maxlength="900" required></textarea>
        </div>
        <div class="form-row">
          <label for="np-category" class="top">Category: </label>
          <input id="np-category" type="radio" name="category" value="1" required>health
          and nutrition<br>
          <input id="np-category" type="radio" name="category" value="2">behaviour<br>
          <input id="np-category" type="radio" name="category" value="3">funny
          stories
        </div>
        <div class="form-row">
          <label for="np-image" class="top">Image: </label>
          <input id="np-image" name="np-image" class="button" type="file"/>
        </div>

        <input type="submit"/>
      </form>
      </div>
      <div class="side-bar-login-form">

      </div>

      <?php
    }
    else {
      header("Location: login.php");
    }
  }
  else{
    require 'connection.php';

    $sql = "SELECT * FROM post WHERE postid = ?";
    $stat = $connection->prepare($sql);
    $stat->bind_param('i', $id);
    $stat->execute();
    $res = $stat->get_result();

    $row = $res->fetch_assoc();

    $category = $row['category'];
    $title  = htmlspecialchars($row['title']);
    $author = htmlentities($row['author']);
    $date = $row['postDate'];
    $pic = htmlspecialchars($row['pic']);
    $content = htmlentities($row['content']);

    if ($category == 1){
      $category_name = "health and nutrition";
    }else if($category == 2){
      $category_name = "behaviour";
    }else if($category == 3){
      $category_name = "funny stories";
    }
  }

  //need to dispaly navigation along the top
  echo"<h5><a href = \"home.php\">Home</a> -> <a href = \"home.php?category=$category\">" . $category_name . "</a> -> " . $title . "</h5>"; //make h5 really small,also make # become a link to category page of the home page



echo"
          <div class=\"entry\">
            <figure>
              <img src=\" " . $pic . "\" alt=\" " . $title . "\" />
            </figure>
            <div>
              <h2>" . $title . "</h2>
              <p><a href=\"profile.php?user=$author\">" . $author . "</a>    |       " .  $date . "</p>  <!--LINK TO AUTHORS PROFILE?? HOWWWW-->
            </div>
			<div class=\"clearfix\"></div>
          </div>";

echo" 
		<div>
		<p>" . $content . "</p>
		</div>";

		  //show all comments on the post
		  
	$sql2 = "SELECT * FROM comments WHERE postid = $id";
    $stat = $connection->prepare($sql2);
    $stat->execute();
    $res = $stat->get_result();

	while($row = $res->fetch_assoc()){
		$commentAuthor = htmlspecialchars($row['author']);
		$commentContent = $row['content'];
		
		echo "
			<p><a href='/profile.php?user=$commentAuthor'>$commentAuthor</a></p>
			<p>" . $commentContent . "</p>
			<br>
		";
			
	}

	if (!empty($_SESSION['username'])) { ?>
	
	
	<form method = "post" action = "newComment.php">
		<textarea id="comment" name="comment" placeholder="max 500 characters" maxlength = "500"  required></textarea>
		<input type = "hidden" name = "id" value = <?php print $id; ?> >
		<input type = "hidden" name = "username" value = <?php print $_SESSION['username']; ?> >
		<input type="submit">
	</form>
	
	
	
	<?php } ?>
	
	
<?php
  require 'inc/footer.inc.php';
?>

  </body>
</html>