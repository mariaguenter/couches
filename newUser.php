<?php

  if (!isset($_SESSION)) {
    session_start();
  }

	require 'connection.php';

	$exists = false;
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if (isset($_POST['firstname']) && isset($_POST['lastname'])  && isset($_POST['username'])  && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword']) && isset($_POST['question']) && isset($_POST['answer']) && isset($_FILES['profilePic']) ) {
			$fname = $connection->real_escape_string($_POST['firstname']);
			$lname = $connection->real_escape_string($_POST['lastname']);
			$user = $_POST['username'];
			$email = $_POST['email'];
			$pass = $_POST['password'];
			$confirmPass = $_POST['confirmPassword'];
      $profile_pic = "images/public/" . $_FILES['profilePic']['name'];
			$option = $_POST['question'];
			if ($option == 'breed'){
				$question = 'What is the breed of your current cat?';
			}else if ($option == 'name'){
				$question = 'What was your first cat\'s name?';
			
			}else if ($option == 'sum'){
				$question = 'How many cats have you owned?';
			
			}else if ($option == 'artist'){
				$question = 'If you could name your cat after a celebrity, who would it be?';
			}			
			$answer = $connection->real_escape_string($_POST['answer']);
			$picture = $_POST['profilePic'];

      $safe_user = $connection->real_escape_string($user);
      $safe_email = $connection->real_escape_string($email);
			
			if ($stat = $connection->query("select * from user where username = '$safe_user' or email = '$safe_email'")) {
        while ($row = $stat->fetch_assoc()) {
          header('Location: alreadyUser.php');die();
          break;
        }
			}
			if ($pass != $confirmPass){
				header('Location: newUserNoMatch.php');
			}
			
			if ($exists == false) {
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
            $pass = md5($pass);
            $safe_pic = $connection->real_escape_string($target_file);
            $sql = "insert into user(username, fname, lname, email, pass, quest, ans, profilePic) values ('$safe_user','$fname','$lname','$safe_email','$pass','$question','$answer','$safe_pic')";
            $connection->query($sql);

            $_SESSION['username'] = $user;
          } else {
            die("Failed to move file $target_file");
          }
        }
			}
      
			$connection->close();
			header('Location: profile.php');
		}
	}
