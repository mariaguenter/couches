

<?php
  if (!isset($_SESSION)) {
    session_start();
  }

  if (isset($_SESSION['username'])) {
    header('Location: cosc360.ok.ubc.ca/33354144/home.php');
  }

  require 'connection.php';
  $exists = FALSE;
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
      $user = $connection->real_escape_string($_POST['username']);
      $pass = $_POST['password'];

      $pass2 = md5($pass);
      $stat = $connection->query("select * from user where username = '$user' and pass = '$pass2'");

      while ($row = $res->fetch_assoc()) {
        $exists = TRUE;
        $_SESSION['username'] = $user;
        $admin = $row['adminPriv'];
        if ($admin == TRUE){
          $_SESSION['admin'] = $admin;
        }
        header('Location: cosc360.ok.ubc.ca/33354144/home.php');

        break;
      }
		
      if (!$exists) {
        header('Location: cosc360.ok.ubc.ca/33354144/badLogin.php');
      }
    } else {
      header('Location: cosc360.ok.ubc.ca/33354144/login.php');
    }

    $connection->close();

  } else {
    header('Location: cosc360.ok.ubc.ca/33354144/login.php');
  }
