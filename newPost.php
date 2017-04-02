<?php

  if (!isset($_SESSION)) {
  	session_start();
	}
	
	require 'connection.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if (isset($_POST['np-title']) && isset($_POST['np-content'])  && isset($_POST['category'])  && isset($_FILES['np-image']) ) {
			$title = $_POST['np-title'];
			$content = $_POST['np-content'];
			$category = $_POST['category'];
			$pic = empty($_FILES['np-image']) ? '' : "images/public/" . $_FILES['np-image']['name'];
			$rating = 0;
			$username = $_SESSION['username'];

      $safe_author = $connection->real_escape_string($username);
      $safe_title = $connection->real_escape_string(htmlspecialchars($title));
      $safe_content = $connection->real_escape_string(htmlspecialchars($content));

      $target_dir = "images/public/";
      $target_file = $target_dir . basename($_FILES["np-image"]["name"]);
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

      // Check if image file is a actual image or fake image
      $check = getimagesize($_FILES["np-image"]["tmp_name"]);
      if ($check !== false) {
        $uploadOk = 1;
      } else {
        $error = "File is not an image.";
        $uploadOk = 0;
      }

      // Check if file already exists
      if (file_exists($target_file)) {
        $base_name = str_replace(".$imageFileType", '', $_FILES['np-image']['name']);
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
      if ($_FILES["np-image"]["size"] > 2048000) {
        $error = "File is too large.";
        $uploadOk = 0;
      }
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $error = "File is the wrong mime (mimetype is $imageFileType).";
        $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded. $error"; die();
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["np-image"]["tmp_name"], $target_file)) {
          $safe_pic = $connection->real_escape_string($target_file);
          $sql = "insert into post(author, pic, category, rating, title, content) values ('$safe_author','$safe_pic',$category,$rating,'$safe_title','$safe_content')";
          $stat = $connection->query($sql);
          $post_id = $stat->insert_id;
        } else {
          header("Location: home.php");
        }
      }

		}

		$connection->close();
		header("Location: post.php?id=$post_id"); //take to page for that post, idk what the link is for this tho
	}
