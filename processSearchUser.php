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

			$exists = false;
			$user = "Not Found";
			$fname = "Not Found";
			$lname = "Not Found";
			$email = "Not Found";
			$adminPriv = "Not Found";
			$count = 0;
			$GLOBALS['user'] = $user;

			if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				if (isset($_POST['username'])) {
					$user = $connection->real_escape_string(htmlspecialchars($_POST['username']));

					if($stat = $connection->query("select username, fname, lname, email, adminPriv from user where username='$user' or email = '$user'")){

						while ($row = $stat->fetch_object()) {
							if ($row->fname == NULL) {
								break;
							}
							$exists = True;
							$fname = $row->fname;
							$lname = $row->lname;
							$email = $row->email;
							$adminPriv = $row->adminPriv;
		
							break;
						}
						$stat->close();
					}

					$connection->close();
				}
			}

			echo "
			<div id =\"Searchresults\">
				<h7>User: &nbsp &nbsp $user <br>
				First Name: &nbsp &nbsp $fname <br>
				Last Name: &nbsp&nbsp $lname <br>
				Email: &nbsp&nbsp $email <br>
				adminPriv: &nbsp&nbsp $adminPriv </h7> <br>
			</div>";



			if ($exists == True) {
		?>	

			<form method = "post" action = "deleteUser.php" id="deleteUser" onsubmit="return confirm('Are you sure you want to delete this user?');" >
				<input type = "submit" value = "Delete User" >
				<input type="hidden" name="user" value="<?php print $user; ?>">
			</form>
			<br>
			
			<?php
				if($adminPriv == True) { ?>
			<form method = "post" action = "disableUser.php" id="disableUser" >
				<input type = "submit" value = "Disable User" >
				<input type="hidden" name="user" value="<?php print $user; ?>">
			</form>
			<?php } else { ?>
			<form method = "post" action = "enableUser.php" id="enableUser" >
				<input type = "submit" value = "Enable User" >
				<input type="hidden" name="user" value="<?php print $user; ?>">
			</form>		
			
			
<?php
				}
			}
			else {
				echo"<h1>no results</h1>";
				echo"<p><a href =\"admin.php\">return</a></p>";
			}
			echo"<br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
  include ('inc/footer.inc.php');;
?>

		</body>
		</html>