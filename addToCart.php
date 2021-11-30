<?php
  require('./database.php');
  session_start();

  if (isset($_POST['add'])) {
    $itemId = filter_input(INPUT_POST, 'id');
    $email = $_SESSION['email'];
    $userQuery = "SELECT * FROM user WHERE email = :email";
    $userPrep = $db->prepare($userQuery);
    $userPrep->bindParam(':email', $email, PDO::PARAM_STR);
    $userExecute = $userIdPrep->execute();
    $userId = $userExecute['id'];

    $insertQuery = "INSERT INTO cart (id, itemId) VALUES (':userId', ':itemId')";
    $insert = $db->prepare($insertQuery);
    $insert->bindParam(':userId', $userId, PDO::PARAM_INT);
    $insert->bindParam(':itemId', $itemId, PDO::PARAM_INT);
    $result = $insert->execute();

    header('location: cart.php');
  }
?>