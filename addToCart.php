<?php
  require('./database.php');
  session_start();

  $input = filter_input(INPUT_POST, 'id');
  $itemID = $input['id'];

  $email = $_SESSION['email'];

  $queryItemsToAdd = 'SELECT * FROM menuitem WHERE menuitem.id = '$itemId'';
  $queryCurrentUserID = 'SELECT id FROM user WHERE user.email = '$email'';

  $userID = $db->query($queryCurrentUserID);
  $itemsToAdd = $db->query($queryItemsToAdd);

  $queryAlterCart = 'INSERT INTO cart VALUES ('$userID', '$itemsToAdd')';
  header("Location: menu.php");
?>
