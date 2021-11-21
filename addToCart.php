<?php
  require('./database.php');
  session_start();

  $id = filter_input(INPUT_POST, 'id');

  $queryItemsToAdd = 'SELECT * FROM books WHERE id = '$id'';
  $email = $_SESSION['email'];
  $queryCurrentUserID = 'SELECT id FROM user WHERE email = $email';

  $userID = $db->query($queryCurrentUserID);
  $itemsToAdd = $db->query($queryItemsToAdd);

  $queryAlterCart = 'INSERT INTO cart VALUES ($userID, $itemsToAdd)';
  header("Location: menu.php");
?>
