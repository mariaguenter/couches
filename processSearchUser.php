<?php
  if (!isset($_SESSION)) {
	  session_start();
	}

  $title = "Search User";
  if (empty($_SESSION['admin'])) {
    header("Location: cosc360.ok.ubc.ca/33354144/home.php"); 
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

					if($stat = $connection->query("select username, fname, lname, email, adminPriv, count(postid) as numPosts from user left join post on user.username = post.author where username='$user'")){

						while ($row = $stat->fetch_object()) {
							if ($row->fname == NULL) {
								break;
							}
							$exists = True;
							$fname = $row->fname;
							$lname = $row->lname;
							$email = $row->email;
							$adminPriv = $row->adminPriv;
							$count = $row->numPosts;
							break;
						}
						$stat->close();
					}

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



			if ($exists == True) {
		?>	

			<form method = "post" action = "deleteUser.php" id="deleteUser" >
				<input type = "submit" value = "Delete User" >
				<input type="hidden" name="user" value="<?php print $user; ?>">
			</form>
			
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
  include ('inc/footer.inc.php');;
?>

		</body>
		</html>