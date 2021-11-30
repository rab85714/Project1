<?php
  require('./database.php');
  session_start();

  $itemId = filter_input(INPUT_POST, 'id');
  $userIdQuery = "SELECT id FROM user WHERE email = '{$_SESSION['email']}'";
  $userId = $db->query($userIdQuery);

  $queryInsert = "INSERT INTO cart VALUES ('{$userId}', '$itemId')";
  $insert = $db->query($query);
  header("Location: cart.php");
?>