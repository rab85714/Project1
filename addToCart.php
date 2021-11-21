<?php
  require('./database.php');
  session_start();

  $id = filter_input(INPUT_POST, 'id');
  $email = $_SESSION['email'];

  $queryItemsToAdd = 'SELECT * FROM books WHERE id = '$id'';
  $queryCurrentUserID = 'SELECT id FROM user WHERE user.email = '$email'';

  $userID = $db->query($queryCurrentUserID);
  $itemsToAdd = $db->query($queryItemsToAdd);

  $queryAlterCart = 'INSERT INTO cart VALUES ('$userID', '$itemsToAdd')';
  header("Location: menu.php");
?>
