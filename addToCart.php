<?php
  require('./database.php');
  session_start();

  $itemId = filter_input(INPUT_POST, 'id');
  $email = $_SESSION['email'];

  $queryItemsToAdd = 'SELECT * FROM menuitem WHERE id = '$itemId'';
  $userId = 'SELECT id FROM user WHERE user.email = '$email'';

  $query = 'INSERT INTO cart VALUES ('$userId', '$itemId')';
  $info = $db->query($query);
  header("Location: cart.php");
?>