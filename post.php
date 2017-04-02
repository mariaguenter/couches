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
	
  require 'header.php';



  $category = database stuff;
  $tite  = database stuff;
  $author = database stuff;
  $date = database stuff;
  $pic = database stuff;
  $content = database stuff;
  $comments = [];
  $count = 0;
  while (row results or somethin){
	  $comments[] = row->comid;
	  $count = $count + 1;
  }
  if ($category == 1){
	  $category = "health and nutrition";
  }else if($category == 2){
	  $category = "behaviour";
  }else if($category == 3){
	  $category = "funny stories";
  }
  
  
  
  //need to dispaly navigation along the top
  echo"<h5><a href = \"home.php\">Home</a> -> <a href = \"#\">" . $category . "</a> -> " . $title . "</h5>"; //make h5 really small,also make # become a link to category page of the home page



echo"
	<body>
          <div class=\"entry\">
            <figure>
              <img src=\" " . $pic . "\" alt=\" " . $title . "\" />
            </figure>
            <div>
              <h2>" . $title . "</h2>
              <p><a href=\"#\">" . $author . "</a>    |       " .  $date . "</p>  <!--LINK TO AUTHORS PROFILE?? HOWWWW-->
			  <p class=\"comments\">" . $count . "comments</p>
            </div>
          </div>"
		  
		  //add code to display the content of the post, doesnt have to look good yolo
		  //show all comments on the post, and add comment box (that will use newComment.php) ONLY IF THEY ARE LOGGED IN
















<?php
  }
  require 'footer.php';
?>

  </body>
</html>