<?php
  require('./database.php');
  session_start();

  if (isset($_POST['add'])) {
    $itemId = filter_input(INPUT_POST, 'id');
    $email = $_SESSION['email'];
    $userQuery = "SELECT id FROM user WHERE email = :email";
    $userIdPrep = $db->prepare($userQuery);
    $userIdPrep->bindParam(':email', $email, PDO::PARAM_STR);
    $userId = $userIdPrep->execute();

    $insertQuery = "INSERT INTO cart (id, itemId) VALUES (':userId', ':itemId')";
    $insert = $db->prepare($insertQuery);
    
    $result = $insert->execute();

    header('location: cart.php');
  }
?>