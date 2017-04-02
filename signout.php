<?php
  $title = "Signout";

  if (!isset($_SESSION)) {
    session_start();
  }

  session_unset();
  session_destroy();
?>

<!DOCTYPE html>
<html>
  <?php require 'inc/head.inc.php'; ?>

  <body>
    <?php require 'inc/header.inc.php'; ?>

    <h1>you are now signed out</h1>

    <?php include 'inc/footer.inc.php'; ?>
  </body>
</html>
