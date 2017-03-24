<?php
  $title = "Admin Controls";
  if (empty($_SESSION['admin'])) {
    header("Location: index.php");
  }
?>

<!DOCTYPE html>
<html>
  <?php require 'inc/head.inc.php'; ?>

  <body>
    <?php require 'inc/header.inc.php'; ?>

    <h1>search users/enable or disable users/ edit/remove psots or users - Maria will finish this later lololol 8=====D~~~</h1>

    <?php require 'inc/footer.inc.php'; ?>

  </body>
</html>
