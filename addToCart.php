<?php
  require('./database.php');
  session_start();

  $itemId = filter_input(INPUT_POST, 'id');
  $userQuery = "SELECT * FROM user WHERE email = '{$_SESSION['email']}'";
  $user = $db->query($userQuery);
  $menuItemIdQuery = "SELECT id FROM menuitem WHERE id = '{$itemId}'";

  $queryInsert = "INSERT INTO cart VALUES ({$user['id'] + 0}, 1)";
  $insert = $db->query($queryInsert);

  header('location: cart.php');

?>