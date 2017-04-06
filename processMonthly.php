<?php
  if (!isset($_SESSION)) {
	  session_start();
	}

  $title = "Search User";
  if (empty($_SESSION['admin'])) {
    header("Location: home.php"); 
  }
?>

<!DOCTYPE html>
<html>
  <?php require 'inc/head.inc.php'; ?>

  <body>
    <?php
			require 'inc/header.inc.php';
			require 'connection.php';
			
				echo"<h1> Usage Report:</h1>";
					if($stat = $connection->query("select count(username) as numUsers from user")){

						while ($row = $stat->fetch_object()) {
							if ($row->numUsers == NULL) {
								break;
							}
							
							$num = $row->numUsers;

							echo 
							"<br>
							<p>
								Total number of user: $num 
								
							</p>
							<br>";

							
						}
						$stat->close();
					}
					if($stat = $connection->query("select count(adminPriv) as numAdmins from user where adminPriv = TRUE")){

						while ($row = $stat->fetch_object()) {
							if ($row->numAdmins == NULL) {
								break;
							}
							
							$num4 = $row->numAdmins;

							echo 
							"<br>
							<p>
								Total number of admin users: $num4 
								
							</p>
							<br>";

							
						}
						$stat->close();
					}
					if($stat = $connection->query("select count(postid) as numPosts from post where postDate > '2017-03-31'")){

						while ($row = $stat->fetch_object()) {
							if ($row->numPosts == NULL) {
								break;
							}
							
							$num2 = $row->numPosts;


							echo 
							"<br>
							<p>
								Total number of posts this April: $num2
							</p>
							<br>";

							
						}
						$stat->close();
					}
					if($stat = $connection->query("select count(comid) as numComs from comments")){

						while ($row = $stat->fetch_object()) {
							if ($row->numComs == NULL) {
								break;
							}
							
							$num3 = $row->numComs;


							echo 
							"<br>
							<p>
								Total number of comments: $num3 
							</p>
							<br>";

							
						}
						$stat->close();
					}
					

					$connection->close();
				
						
			
			
			

  include ('inc/footer.inc.php');
?>

		</body>
		</html>