<?php $title = "Home"; ?>

<!DOCTYPE html>
<html>

  <?php require 'inc/head.inc.php'; ?>

  <body>

    <?php require 'inc/header.inc.php'; 
		require 'connection.php';
	?>

    <div id="main" class="grid-row">
      <article id="left-sidebar" class="col-1">
        <ul id="post-types">
          <li><a href="#">top</a></li> <!-- change what is displayed, chagne the query i guess? I have no clue -->
          <li><a href="#">new</a></li> <!-- this is the default -->
          <li><a href="#">health and nutrition</a></li>
          <li><a href="#">behaviour</a></li>
          <li><a href="#">funny stories</a></li>
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
		
		<!-- defauly is just to disply newest (say limit top 20) -->
		<?php
		if($stat = $connection->prepare("select ")) {
			$stat->bind_param("s", $user);
			$stat->execute();
			$res = $stat->get_result();
			
			while($row = $res->fetch_assoc()){
				//$postPic = ?? magic
				$date = $row->postDate;
				$title = $row->$title;
				$numComments = $row->numCom;		
				echo"
				  <div class=\"entry\"><!-- eventually add thumbs up feature-->
					<figure>
					  <img src=\"images/blank.jpg\" alt=\"Post Picture\" /> <!--ADD PIC MAGIC -->
					</figure>
					<div>
					  <h2 id = \"first\"><a href =\"#\">Thread Title</a></h2>
					  <p><a href=\"#\">author</a>    |        date/time</p>
					  <p class=\"comments\">nummber of comments</p>
					</div>
				  </div>";
		?>

        </article>
      </div>


      <article id="right-sidebar" class="col-2">
        <div class="new-post-container hidden">
          <p class="centerP">Write new post</p>
		      <?php if (isset($_SESSION['username'])) { ?>
          <form id="side-bar-new-post" action="newPost.php">
            <div class="form-row">
              <label for="np-title" class="top">Title: </label>
              <input id="np-title" type="text" maxlength = "30" required/>
            </div>
            <div class="form-row">
              <label for="np-content" class="top">Content: </label>
              <textarea id="np-content" placeholder="max 800 characters" maxlength = "900"  required></textarea>
            </div>
            <div class="form-row">
              <label for="np-category" class="top">Category: </label>
              <input id="np-category" type="radio" name="category" value="1" required>health and nutrition<br>
              <input id="np-category" type="radio" name="category" value="2">behaviour<br>
              <input id="np-category" type="radio" name="category" value="3">funny stories
            </div>
            <div class="form-row">
              <label for="np-image" class="top">Image: </label>
              <input id="np-image" class="button" type="file"/>
            </div>

            <input type="submit"/>
          </form>
        </div>
        <div class="side-bar-login-form">

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
