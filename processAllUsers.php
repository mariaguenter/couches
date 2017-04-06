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
			
				echo"<h1>      All Users:</h1>";
					if($stat = $connection->query("select username, fname, lname, email, adminPriv from user")){

						while ($row = $stat->fetch_object()) {
							if ($row->fname == NULL) {
								break;
							}
							$user = $row->username;
							$fname = $row->fname;
							$lname = $row->lname;
							$email = $row->email;
							$adminPriv = $row->adminPriv;
							echo 
							"<br>
							<p>
								User: $user <br>
								First Name: $fname <br>
								Last Name: $lname <br>
								Email: $email <br>
								adminPriv: $adminPriv
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