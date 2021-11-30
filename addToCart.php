<?php
  require('./database.php');
  session_start();

  $itemId = filter_input(INPUT_POST, 'id');
  $sessionId = $_SESSION['id'];
  $menuItemIdQuery = "SELECT id FROM menuitem WHERE id = '{$itemId}'";

  $queryInsert = "INSERT INTO cart (id, itemId) VALUES (':userId', ':itemId')";
  $insert->bindParam(':userId', $sessionId, PDO::PARAM_INT);
  $insert->bindParam(':itemId', $itemId, PDO::PARAM_INT);
  $insert = $db->query($queryInsert);

  header('location: cart.php');

?>