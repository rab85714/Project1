<?php
  require('./database.php');
  session_start();

  $itemId = filter_input(INPUT_POST, 'id');
  $userQuery = "SELECT id FROM user WHERE email = '{$_SESSION['email']}'";
  $userId = $db->query($userQuery);
  $menuItemIdQuery = "SELECT id FROM menuitem WHERE id = '{$itemId}'";

  $queryInsert = "INSERT INTO cart (id, itemId) VALUES (':userId', ':itemId')";
  $insert->bindParam(':userId', $userId, PDO::PARAM_INT);
  $insert->bindParam(':itemId', $itemId, PDO::PARAM_INT);
  $insert = $db->query($queryInsert);

  header('location: cart.php');

?>