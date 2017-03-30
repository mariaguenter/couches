<!DOCTYPE html>
<html> 
    <head lang="en">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Playfair Display">
    <meta charset="utf-8">
    <title>View Post</title>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="css/style.css" />
	<link rel="icon" href="images/thumbnail.png">
  </head>

  <body>

<?php
	session_start();
  require 'header.php';
  
  //need to dispaly navigation along the top
  $category = database stuff;
  $tite  database stuff;
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
  echo'<h5><a href = "home.php">Home</a> -> <a href = "#">$category</a> -> $title</h5>'; //make h5 really small



// display post picture, author,date,content,comments,add a comment 

//I have no idea how to get this from the database based on the previous page ya know -->
echo"
	<body>
          <div class=\"entry\">
            <figure>
              <img src=\"$pic\" alt=\"$title\" />
            </figure>
            <div>
              <h2>$title</h2>
              <p><a href=\"#\">$author</a>    |        $date</p> LINK TO AUTHORS PROFILE?? HOWWWW
              <p class=\"comments\">$count comments</p>
            </div>
          </div>"
		  
		  //more stuff to make it post all the comments. not gonna do this till the database is up
















<?php
  }
  require 'footer.php';
?>

  </body>
</html>