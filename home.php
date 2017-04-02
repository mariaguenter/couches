<?php //phpinfo();
  if (!isset($_SESSION)) {
    session_start();
  }

  $title = "Home";

  if (isset($_GET['category'])) {
    $category = htmlspecialchars($_GET['category']);
  }
  else {
    $category = "new";
  }

  $order = 'post.postDate';
  $where = '';

  switch ($category) {
    case 'top':
      $order = "post.rating";
      $crumb = "Top Rated";
      break;
    case 1:
      $where = " WHERE post.category = 1 ";
      $crumb = "Health and Nutrition";
      break;
    case 2:
      $where = " WHERE post.category = 2 ";
      $crumb = "Behaviour";
      break;
    case 3:
      $where = " WHERE post.category = 3 ";
      $crumb = "Funny Stories";
      break;
    default:
      $crumb = "Newest";
  }

  if (isset($_GET['search'])) {
    $term = htmlspecialchars($_GET['search']);

    if (!empty($where)) {
      $where .= "AND post.title LIKE '%$term%' ";
    }
    else {
      $where = " WHERE post.title LIKE '%$term%' ";
    }
  }

?>

<!DOCTYPE html>
<html>

  <?php require 'inc/head.inc.php'; ?>

  <body>

    <?php
      require 'inc/header.inc.php';
      require 'connection.php';
    ?>

    <div id="main" class="grid-row">
      <article id="left-sidebar" class="col-1">
        <ul id="post-types">
          <li><a href="home.php?category=top">top</a></li>
          <li><a href="home.php?category=new">new</a></li>
          <li><a href="home.php?category=1">health and nutrition</a></li>
          <li><a href="home.php?category=2">behaviour</a></li>
          <li><a href="home.php?category=3">funny stories</a></li>
        </ul>

      </article>

      <div id="center-container" class="col">
        <div id="searchBar">
          <form id="searchbox" action="">
            <input id="search" name="search" type="text" placeholder="search away">
            <input type="submit">
          </form>
        </div>

        <article id="center">
          <h1><?php print $crumb; ?></h1>
		
		<!-- defauly is just to disply newest (say limit top 20) -->
		<?php
		if($stat = $connection->query("select post.postid, post.postDate, post.author, post.pic, post.title, post.rating, sum(comid) as numCom from post left join comments on post.postid = comments.postid $where group by post.postid, post.postDate, post.author, post.pic, post.title, post.rating order by $order DESC, post.rating DESC")) {
			//if(!$stat->execute())(die($stat->error));
			$res = $stat;//->get_result();
			
			while($row = $res->fetch_assoc()){
			  $post_id = $row['postid'];
				$postPic = empty($row['pic']) ? 'images/blank.jpg' : $row['pic'];
				$date = $row['postDate'];
				$author = htmlspecialchars($row['author']);
				$post_title = htmlentities($row['title']);
				$numComments = empty($row['numCom']) ? 0 : $row['numCom'];
				echo"
				  <div class=\"entry\"><!-- eventually add thumbs up feature-->
					<figure>
					  <img src=\"$postPic\" alt=\"Post Picture\" /> 
					</figure>
					<div>
					  <h2 id = \"first\"><a href =\"post.php/id=$post_id\">" . $post_title . "</a></h2>
					  <p><a href=\"profile.php?user=$author\">" . $author . "</a>       |   ". "     " . $date . "</p>
					  <p class=\"comments\">" . $numComments . "comments</p>
					</div>
				  </div>";
			}
		}
		?>

        </article>
      </div>


      <article id="right-sidebar" class="col-2">
        <div class="new-post-container hidden">
          <p class="centerP">Write new post</p>
		      <?php if (isset($_SESSION['username'])) { ?>
          <form id="side-bar-new-post" method="post" action="newPost.php" enctype="multipart/form-data">
            <div class="form-row">
              <label for="np-title" class="top">Title: </label>
              <input id="np-title" name="np-title" type="text" maxlength = "30" required/>
            </div>
            <div class="form-row">
              <label for="np-content" class="top">Content: </label>
              <textarea id="np-content" name="np-content" placeholder="max 800 characters" maxlength = "900"  required></textarea>
            </div>
            <div class="form-row">
              <label for="np-category" class="top">Category: </label>
              <input id="np-category" type="radio" name="category" value="1" required>health and nutrition<br>
              <input id="np-category" type="radio" name="category" value="2">behaviour<br>
              <input id="np-category" type="radio" name="category" value="3">funny stories
            </div>
            <div class="form-row">
              <label for="np-image" class="top">Image: </label>
              <input id="np-image" name="np-image" class="button" type="file"/>
            </div>

            <input type="submit"/>
          </form>
        </div>

        <?php } else { ?>
        <p class="centerP">Please <a href="login.php">LOGIN</a> to make a post</p>
        <?php } ?>
        <img id = "sleepy" src="images/ozzy.jpg" alt="sleepy kitty" />
      </article>
    </div>

    <?php require 'inc/footer.inc.php'; ?>

  </body>
</html>
