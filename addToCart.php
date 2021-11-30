<?php
  require('./database.php');
  session_start();

  $itemId = filter_input(INPUT_POST, 'id');
  $email = $_SESSION['email'];
  $userIdQuery = 'SELECT id FROM user WHERE email = '$email'';
  $userId = $db->query($userIdQuery);

  $queryInsert = 'INSERT INTO cart VALUES ('$userId', '$itemId')';
  $insert = $db->query($query);
  header("Location: cart.php");
?>