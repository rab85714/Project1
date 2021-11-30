<?php
  require('./database.php');
  session_start();

  $itemId = filter_input(INPUT_POST, 'id');
  $email = $_SESSION['email'];

  $query = 'INSERT INTO cart VALUES (1, 1)';
  $info = $db->query($query);
  header("Location: cart.php");
?>