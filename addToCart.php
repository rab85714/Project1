<?php
  require('./database.php');
  session_start();

  $itemId = filter_input(INPUT_POST, 'id');
  $userIdQuery = "SELECT id FROM user WHERE email = '{$_SESSION['email']}'";
  

  $queryInsert = "INSERT INTO cart VALUES ('{$userIdQuery}', '$itemId')";
  $insert = $db->query($query);
  header("Location: cart.php");
?>