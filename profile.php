<?php
  $title = "Profile";

  if (empty($_SESSION['username'])) {
    header("Location: login.php");
  }
?
>

<!DOCTYPE html>
<html>
  <?php require 'inc/head.inc.php'; ?>

  <body>

    <?php require 'inc/header.inc.php'; ?>
    <article id="centerProfile">
      <div id="profileEntry">
        <figure>
          <img src="images/blank.jpg" alt="profile picture" /><!--make open in pop up-->
        </figure>
        <div>
          <h3>Firstname Lastname</h3>
          <p id="edit"><a href = "edit.php">edit</a></p>
        </div>
      </div>
      <br/>

      <h4>Posts</h4>
      <div id="posts">
        <div class="postEntry"><!-- eventually add thumbs up feature-->
          <figure>
            <img src="images/blank.jpg" alt="" />
          </figure>
          <div>
            <h2 id = "first"><a href ="#">Thread Title</a></h2>
            <p><a href="#">author</a>    |        date/time</p>
            <p class="comments">nummber of comments</p>
          </div>
        </div>
        <div class="postEntry"><!-- eventually add thumbs up feature-->
          <figure>
            <img src="images/blank.jpg" alt="" />
          </figure>
          <div>
            <h2 id = "second"><a href ="#">Thread Title</a></h2>
            <p><a href="#">author</a>    |        date/time</p>
            <p class="comments">nummber of comments</p>
          </div>
        </div>
        <div class="postEntry"><!-- eventually add thumbs up feature-->
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
