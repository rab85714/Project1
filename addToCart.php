<?php
  require('./database.php');
  session_start();

  $itemId = filter_input(INPUT_POST, 'id');
  $userIdQuery = "SELECT id FROM user WHERE email = '{$_SESSION['email']}'";
  $userId = $db->query($userIdQuery);
  $menuItemIdQuery = "SELECT id FROM menuitem WHERE id = '{$itemId}'";

  $queryInsert = "INSERT INTO cart VALUES ($userId, 1)";
  $insert = $db->query($queryInsert);

  header('location: cart.php');

?>