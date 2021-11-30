<?php
  require('./database.php');
  session_start();

  $query = 'INSERT INTO cart VALUES (1, 1)';
  $info = $db->query($query);
  header("Location: cart.php");
?>