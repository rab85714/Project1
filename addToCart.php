<?php
  require('./database.php');
  session_start();

  $itemId = filter_input(INPUT_POST, 'id');
  $userIdQuery = "SELECT id FROM user WHERE email = '{$_SESSION['email']}'";


  $queryInsert = "INSERT INTO cart VALUES (1, '$itemId')";
  $insert = $db->query($queryInsert);
  header("Location: cart.php");
?>