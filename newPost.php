<?php


	
	require 'connection.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if (isset($_POST['np-title']) && isset($_POST['np-content'])  && isset($_POST['category'])  && isset($_POST['np-image']) ) { //dont know if catgory name thing is correct
			$title = $_POST['np-title'];
			$content = $_POST['np-content'];
			$category = $_POST['category']; //not sure if corrrect
			$pic = $_POST['np-image'];
			$rating = 0;
			$username = $_SESSION['username']; 
				
			

				if($stat = $connection->prepare("insert into post(title, content, category, rating, author) values (?,?,?,?,?)") ){
					$stat->bind_param("sssss", $title, $content, $category, $rating, $username);
					$stat->execute();
					$stat->close();
				
					

					
				//This is all stuff from lab 9 to get the photo into the database
				//We can change this to just make it store the path to the photo or whatever you wanna do!
						$target_dir = "uploads/";
						$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
						$uploadOk = 1;
						$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						// Check if image file is a actual image or fake image
						if(isset($_POST["submit"])) {
							$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
							if($check !== false) {
								echo "File is an image - " . $check["mime"] . ".";
								$uploadOk = 1;
							} else {
								echo "File is not an image.";
								$uploadOk = 0;
							}
						}
						
						// Check if file already exists
						if (file_exists($target_file)) {
							echo "Sorry, file already exists.";
							$uploadOk = 0;
						}
						 // Check file size
						if ($_FILES["fileToUpload"]["size"] > 100000) {
							echo "Sorry, your file is too large.";
							$uploadOk = 0;
						}
						// Allow certain file formats
						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
						&& $imageFileType != "gif" ) {
							echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
							$uploadOk = 0;
						}
						// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
							echo "Sorry, your file was not uploaded.";
						// if everything is ok, try to upload file
						} else {
							if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
								echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
							} else {
								echo "Sorry, there was an error uploading your file.";
							}
						}
						
						$imagedata = file_get_contents($target_file);
						//store the contents of the files in memory in preparation for upload
						$sql2 = "INSERT INTO userImages (userID, contentType, image) VALUES(?,?,?)";
						$stmt2 = mysqli_stmt_init($connection); //init prepared statement object

						mysqli_stmt_prepare($stmt2, $sql2); // register the query

						$null = NULL;
						mysqli_stmt_bind_param($stmt2, "isb", $id, $imageFileType, $null);
						// bind the variable data into the prepared statement. You could replace
						// $null with $data here and it also works. You can review the details
						// of this function on php.net. The second argument defines the type of
						// data being bound followed by the variable list. In the case of the
						// blob, you cannot bind it directly so NULL is used as a placeholder.
						// Notice that the parametner $imageFileType (which you created previously)
						// is also stored in the table. This is important as the file type is
						// needed when the file is retrieved from the database.

						mysqli_stmt_send_long_data($stmt2, 2, $imagedata);
						// This sends the binary data to the third variable location in the
						// prepared statement (starting from 0).
						$result = mysqli_stmt_execute($stmt2) or die(mysqli_stmt_error($stmt2));
						// run the statement

						mysqli_stmt_close($stmt2);
						
						
						
				}
			}
			
			
			$connection->close();
			header("Location: ") //take to page for that post, idk what the link is for this tho
		}
	}
	
	
?>



