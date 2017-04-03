<?php
  if (!isset($_SESSION)) {
    session_start();
  }

  $title = "Profile";

  if (empty($_SESSION['username'])) {
    header("Location: cosc360.ok.ubc.ca/33354144/login.php");
  }
?>

<!DOCTYPE html>
<html>
  <?php require 'inc/head.inc.php'; ?>

  <body>

    <?php require 'inc/header.inc.php'; 
		require 'connection.php';
		$user = $_SESSION['username'];
    $no_edit = FALSE;

    if (isset($_GET['user'])) {
      $get_user = htmlspecialchars($_GET['user']);
      $no_edit = $user != $get_user;
      $user = $get_user;
    }

    $safe_user = $connection->real_escape_string($user);

    $stat = $connection->query("select * from user where username = '$safe_user'");

    while ($row = $stat->fetch_assoc()) {
      $fname = $row['fname'];
      $lname = $row['lname'];
      $pic = $row['profilePic'];

      print ""
      . "<article id=\"centerProfile\">"
      .   "<div id=\"profileEntry\">"
      .	    "<figure>"
      .	      "<img src=\"$pic\" alt=\"profile picture\" />"
      .	    "</figure>"
      .	    "<div>"
      .	      "<h3>$fname $lname</h3>";
      if (!$no_edit){
        print "<p id=\"edit\"><a href = \"edit.php\">edit</a></p>";
      }
      print	"</div>"
      .   "</div>"
      .   "<br/>"
      .   "<h4>Posts</h4>"
      .   "<div id=\"posts\">";
    }

    $stat = $connection->query("select post.postid, post.postDate, post.pic, post.title, sum(comid) as numCom from post left join comments on comments.postid = post.postid where post.author = '$user' group by post.postid, post.postDate, post.pic, post.title limit 20");

    while ($row = $stat->fetch_assoc()) {
      $post_id = $row['postid'];
      $postPic = $row['pic'];
      $date = $row['postDate'];
      $title = $row['title'];
      $numComments = empty($row['numCom']) ? 0 : $row['numCom'];
      $comment = $numComments == 1 ? "comment" : "comments";
      echo"
        <div class=\"postEntry\">
          <figure class = \"postPic\">
          <img src=\"$postPic\" alt=\"Post Picture\"  />  
          </figure>
          <div>
          <h2 id = \"first\"><a href =\"post.php?id=$post_id\">" . $title . "</a></h2> 
          <p>" . $date . "</p>
          <p class=\"comments\">" . $numComments . " $comment</p>
          </div>
          <div class=\"clearfix\"></div>
        </div>
       
      ";

    }

    echo "
     </div>
    </article>";

    $connection->close();
	?>

    <?php include ('inc/footer.inc.php'); ?>

  </body>
</html>
