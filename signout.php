<?php
  $title = "Signout";

  unset($_SESSION['username']);
  unset($_SESSION['admin']);
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
