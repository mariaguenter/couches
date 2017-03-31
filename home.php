<?php $title = "Home"; ?>

<!DOCTYPE html>
<html>

  <?php require 'inc/head.inc.php'; ?>

  <body>

    <?php require 'inc/header.inc.php'; ?>

    <div id="main" class="grid-row">
      <article id="left-sidebar" class="col-1">
        <ul id="post-types">
          <li><a href="#">top</a></li>
          <li><a href="#">new</a></li>
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
          <div class="entry"><!-- eventually add thumbs up feature-->
            <figure>
              <img src="images/blank.jpg" alt="" />
            </figure>
            <div>
              <h2 id = "first"><a href ="#">Thread Title</a></h2>
              <p><a href="#">author</a>    |        date/time</p>
              <p class="comments">nummber of comments</p>
            </div>
          </div>

          <div class="entry">
            <figure>
              <img src="images/blank.jpg" alt="" />
            </figure>
            <div>
              <h2><a href ="#" >Thread Title</a></h2>
              <p><a href="#">author</a>    |        date/time</p>
              <p class="comments">number of comments</p>
            </div>
          </div>

          <div class="entry">
            <figure>
              <img src="images/blank.jpg" alt="" />
            </figure>
            <div>
              <h2><a href ="#">Thread Title</a></h2>
              <p><a href="#">author</a>    |        date/time</p>
              <p class = "comments">number of comments</p>
            </div>
          </div>
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
              <input id="np-category" type="radio" name="category" value="category 1" required>Category 1<br>
              <input id="np-category" type="radio" name="category" value="category 2">Category 2<br>
              <input id="np-category" type="radio" name="category" value="category 3">Category 3<br>
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
