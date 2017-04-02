<?php
if (!isset($_SESSION)) {
  session_start();
}

	require 'connection.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if (isset($_FILES['profilePic'])) {
      $profile_pic = "images/public/" . $_FILES['profilePic']['name'];
			$user = $_SESSION['username'];
			
			//change the profile picture
      $target_dir = "images/public/";
      $target_file = $target_dir . basename($_FILES["profilePic"]["name"]);
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

      // Check if image file is a actual image or fake image
      $check = getimagesize($_FILES["profilePic"]["tmp_name"]);
      if($check !== false) {
        $error = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        $error = "File is not an image.";
        $uploadOk = 0;
      }

      // Check if file already exists
      if (file_exists($target_file)) {
        $base_name = str_replace(".$imageFileType", '', $_FILES['profilePic']['name']);
        $i = 0;

        while (true) {
          $target_file = $target_dir . $base_name . "_$i.$imageFileType";

          if (!file_exists($target_file)) {
            break;
          }

          $i++;
        }
      }

      // Check file size
      if ($_FILES["profilePic"]["size"] > 2048000) {
        $error = "Sorry, your file is too large.";
        $uploadOk = 0;
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded. $error"; die();
        // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $target_file)) {
          $sql = "UPDATE user SET profilePic = '$profile_pic' WHERE username = '$user'";
          $connection->query($sql);
        } else {
          die("Failed to move file $target_file");
        }
      }
		}
	}	
	
	
	header("Location: cosc360.ok.ubc.ca/33354144/profile.php");