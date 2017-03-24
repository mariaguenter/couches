<?php 
	session_start();
	if($_SESSION['admin'] == False || isset($_SESSION['admin']) == False){
		header("Location: home.php");
	}
?>

<!DOCTYPE html>
<html>
  <head lang="en">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Playfair Display">
    <meta charset="utf-8">
    <title>Admin Controls</title>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="css/style.css" />
	<link rel="icon" href="images/thumbnail.png">
  </head>

  <body>
<?php

  require 'header.php';

	require 'connection.php';
		$exists = false;
		$user = "Not Found";
		$fname = "Not Found";
		$lname = "Not Found";
		$email = "Not Found";
		$adminPriv = "Not Found";
		$count = 0;
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			if (isset($_POST['username'])) {
				$user = $_POST['username'];

				
				if($stat = $connection->prepare("select username, fname, lname, email, adminPriv, count(postid) as numPosts from user, post where username=? and user.username = post.author group by username, fname, lname, email, adminPriv")){ 
				$stat->bind_param("s", $user);
				$stat->execute();
				$res = $stat->get_result();
				
			
				while ($row = $res->fetch_object()) {
					$fname = $row->fname;
					$lname = $row->lname;
					$email = $row->email;
					$adminPriv = $row->adminPriv;
					$count = $row->numPosts;
					break;
				}
				$stat->close();
				}

				//code on how to get the image (MAT??)

				$connection->close();

			}
		}
		
		echo "
		<fieldset>
			<legend>User: $user </legend>
			First Name: $fname <br>
			Last Name: $lname <br>
			Email: $email <br>
			adminPriv: $adminPriv
		</fieldset>";
		
		//echo '<img src="data:image/'.$type.';base64,'.base64_encode($image).'"/>';   NEED TO CHANGE THIS
		
		echo"
		</body>
		</html>";



  require 'footer.php';
?>

