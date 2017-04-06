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
    header("Location: home.php");
  }
  else{
    require 'connection.php';

    $sql = "SELECT * FROM post WHERE postid = $id";
    $stat = $connection->query($sql);
    $row = $stat->fetch_assoc();

    $category = $row['category'];
    $title  = htmlspecialchars($row['title']);
    $author = htmlentities($row['author']);
    $date = $row['postDate'];
    $pic = htmlspecialchars($row['pic']);
    $content = htmlentities($row['content']);
	$rating = $row['rating'];

    if ($category == 1){
      $category_name = "health and nutrition";
    }else if($category == 2){
      $category_name = "behaviour";
    }else if($category == 3){
      $category_name = "funny stories";
    }
  }

  //need to dispaly navigation along the top
  echo"<h5><a href = \"home.php\">home</a> -> <a href = \"home.php?category=$category\">" . $category_name . "</a> -> " . $title . "</h5>"; //make h5 really small,also make # become a link to category page of the home page



echo"
          <div class=\"entry\">
            <figure >
			<a href=\"" . $pic . "\"data-lightbox=\"postPic\" data-title=\"" . $title . "\">
              <img src=\" " . $pic . "\" alt=\" " . $title . "\" class = \"postPic\"/></a>
            </figure>
            <div>
              <h1>" . $title . "</h1>
              <p><a href=\"profile.php?user=$author\">" . $author . "</a>    |       " .  $date . "</p>  <!--LINK TO AUTHORS PROFILE?? HOWWWW-->
            </div>
			 <div id = \"ratings2\">
				<a  href = \"upRate.php?id=$id\"><img class = \"ratings1\" src=\"images/rateup.png\"  /></a>
				<img class = \"ratings2\" src=\"images/rating.png\" />
				<p>" . $rating . "</p>
			</div>
			<div class=\"clearfix\"></div>
          ";

echo" 
		
		
		<p>" . $content . "</p>
		</div>
		<h1 id = \"commentsHeading\">Comments:</h1>
		<div id = \"commentsDiv\">";

		  //show all comments on the post

	echo"</div>";
	
	if (!empty($_SESSION['username'])) { ?>
	
	
	<form method = "post" action = "newComment.php" id = "commentForm">
		<textarea id="comment" name="comment" placeholder="max 500 characters" maxlength = "500"  required></textarea>
		<input type = "hidden" name = "id" value = <?php print $id; ?> >
		<input type = "hidden" name = "username" value = <?php print $_SESSION['username']; ?> >
		<input type="submit"  value = "comment">
	</form>
	
	
	
	<?php } ?>
	
	
	
<script>
//set interval timers to trigger the refresh.  Here the callback function will
//be called when the timer fires

var var2 = setInterval(timer2, 1000);



//this is the callback function that will be run when timer2 runs.
//This will contact the server at the specified url and wait for the data
//In this case time.php just sends the time back as text but you could
//use this to pull data from a database by changing the php page receiving
//the async request.
function timer2() {
    var results = $.get("ajaxComments.php", {id: <?=$id?>});
    results.done(function(data) {
                          console.log(data);
                          document.getElementById("commentsDiv").innerHTML = data;
                                });
    results.fail(function(jqXHR) {console.log("Error: " + jqXHR.status);});
    results.always(function() {console.log("done");});


}
</script>

<?php
	$connection->close();
  require 'inc/footer.inc.php';
?>

	
	<script src="js/lightbox-plus-jquery.min.js"></script>
  </body>
</html>