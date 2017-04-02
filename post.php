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
    //$comments = $row[];
    $count = 0;
    if ($category == 1){
      $category = "health and nutrition";
    }else if($category == 2){
      $category = "behaviour";
    }else if($category == 3){
      $category = "funny stories";
    }
  }

  //need to dispaly navigation along the top
  echo"<h5><a href = \"home.php\">Home</a> -> <a href = \"home.php?category=$category\">" . $category . "</a> -> " . $title . "</h5>"; //make h5 really small,also make # become a link to category page of the home page



echo"
          <div class=\"entry\">
            <figure>
              <img src=\" " . $pic . "\" alt=\" " . $title . "\" />
            </figure>
            <div>
              <h2>" . $title . "</h2>
              <p><a href=\"profile.php?user=$author\">" . $author . "</a>    |       " .  $date . "</p>  <!--LINK TO AUTHORS PROFILE?? HOWWWW-->
			  <p class=\"comments\">" . $count . "comments</p>
            </div>
          </div>";
		  
		  //add code to display the content of the post, doesnt have to look good yolo
		  //show all comments on the post, and add comment box (that will use newComment.php) ONLY IF THEY ARE LOGGED IN



  require 'inc/footer.inc.php';
?>

  </body>
</html>