<?php
  require('./database.php');
  session_start();

  $itemId = filter_input(INPUT_POST, 'id');
  $userQuery = "SELECT * FROM user WHERE email = '{$_SESSION['email']}'";
  $user = $db->query($userQuery);
  $userId = $user['id'];
  $menuItemIdQuery = "SELECT id FROM menuitem WHERE id = '{$itemId}'";

  $queryInsert = "INSERT INTO cart (id, itemId) VALUES (':userId', ':itemId')";
  $queryInsert->bindParam(':userId', $userId);
  $queryInsert->bindParam(':itemId', $itemId);
  $insert = $db->query($queryInsert);

  header('location: cart.php');

?>