<?php
  require('./database.php');
  session_start();

  $itemId = filter_input(INPUT_POST, 'id');
  $userQuery = "SELECT * FROM user WHERE email = '{$_SESSION['email']}'";
  $menuItemIdQuery = "SELECT id FROM menuitem WHERE id = '{$itemId}'";

  $queryInsert = "INSERT INTO cart VALUES ($userQuery["id"], 1)";
  $insert = $db->query($queryInsert);

  header('location: cart.php');

?>