<?php
	session_start();
	if(isset($_SESSION['username']) == False){
		header("Location: login.php");
	}
?>

<!DOCTYPE html>
<html>
  <head lang="en">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Playfair Display">
    <meta charset="utf-8">
    <title>Profile</title>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="css/style.css" />
	<link rel="icon" href="images/thumbnail.png">
  </head>
  <body>

<?php
  include ('header.php');
?>
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
	
<?php
  include ('footer.php');
?>

  </body>
</html>