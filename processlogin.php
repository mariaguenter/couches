

<?php
  if (isset($_SESSSION['username'])) {
    header('Location: cosc360.ok.ubc.ca/33354144/home.php');
  }

  require 'connection.php';
  $exists = FALSE;
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
      $user = $_POST['username'];
      $pass = $_POST['password'];

      if ($stat = $connection->prepare("select * from user where username = ? and password = ?")) {
        $pass2 = md5($pass);
        $stat->bind_param("ss", $user, $pass2);
        $stat->execute();
        $res = $stat->get_result();

        while ($row = $res->fetch_assoc()) {
          $exists = TRUE;
          $_SESSION['username'] = $user;
          $admin = $row->adminPriv;
          if ($admin == TRUE){
            $_SESSION['admin'] = $admin;
          }
          header('Location: cosc360.ok.ubc.ca/33354144/home.php'); 

          break;
        }
        $stat->close();
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
