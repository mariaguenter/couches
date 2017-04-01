<?php   

  $localhosts = array("::1", "localhost", "127.0.0.1", "192.168.0.1", "192.168.0.0");
  $hostname = $_SERVER['REMOTE_ADDR'];

  if (in_array($hostname, $localhosts)) {
    $host = "localhost";
    $database = "lab8";
    $user = "root";
    $password = "cats";
  }
  else {
    $host = "localhost";
    $database = "db_33354144";
    $user = "33354144";
    $password = "33354144";
  }

  $connection = mysqli_connect($host, $user, $password, $database);

  $error = mysqli_connect_error();
  if ($error != null) {
    $output = "<p>Unable to connect to database!</p>";
    exit($output);
  }
