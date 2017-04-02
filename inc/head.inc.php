<?php
  if (!isset($title)) {
    header("Location: index.php");
  }
?>

<head lang="en">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Playfair Display">
  <meta charset="utf-8">
  <title><?php print $title; ?></title>
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/script.js"></script>
  <link rel="stylesheet" href="css/responsive.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="icon" href="images/thumbnail.png">
</head>
