<?php
  $title = "Search User";
  if (empty($_SESSION['admin'])) {
    header("Location: home.php");
  }
?>

<!DOCTYPE html>
<html>
  <?php require 'inc/head.inc.php'; ?>

  <body>
    <?php require 'inc/header.inc.php'; 

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
				$user = $_POST['username'];

				
				if($stat = $connection->prepare("select username, fname, lname, email, adminPriv, count(postid) as numPosts from user, post where username=? and user.username = post.author group by username, fname, lname, email, adminPriv")){ 
				$stat->bind_param("s", $user);
				$stat->execute();
				$res = $stat->get_result();
				
			
				while ($row = $res->fetch_object()) {
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
		
		if($exists == True){
		?>	

			<form method = "post" action = "deleteUser.php" id="delteUser" >
				<input type = "submit" value = "Delete User" > 
			</form>
			
			<?php
				if($adminPriv == True) { ?>
			<form method = "post" action = "disableUser.php" id="disableUser" >
				<input type = "submit" value = "Disable User" > 
			</form>
			<?php } else { ?>
			<form method = "post" action = "enableUser.php" id="enableUser" >
				<input type = "submit" value = "Enable User" > 
			</form>		
			
			
<?php
			}else{
				echo"<h1>no results</h1>";
				echo"<p><a href =\"admin.php\">return</a></p>";
			}
		}
  require 'footer.php';
?>

		</body>
		</html>