<?php
if (!isset($_SESSION)) {
  session_start();
}

	require 'connection.php';
	$exists = false;
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if (isset($_POST['oldpassword']) && isset($_POST['newpassword']) && isset($_POST['confirmpassword']) ){
			$new = $_POST['newpassword'];
			$old = $_POST['oldpassword'];
			$new2 = $_POST['confirmpassword'];
			$user = $connection->real_escape_string($_SESSION['username']);

      $old = md5($old);
      $stat = $connection->query("select * from user where username='$user' and pass = '$old'");

      while ($row = $stat->fetch_assoc()) {
        $exists = true;
		
        break;
      }

      if($exists){
        if($new == $new2){
          $pass = md5($new);
          $stat = $connection->query("update user set pass = '$pass' where username='$user'");
		  header("Location: profile.php"); 
        }else{
          header("Location: noMatch.php");
        }
      }else{
        header("Location: badPass.php");
      }


		}
	}

	
