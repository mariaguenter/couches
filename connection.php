<?php   //Stolen from lab 9 -- need to change it

  $host = "localhost";
  $database = "lab8";
  $user = "root";
  $password = "cats";

  $connection = mysqli_connect($host, $user, $password, $database);

  $error = mysqli_connect_error();
  if ($error != null) {
    $output = "<p>Unable to connect to database!</p>";
    exit($output);
  }
