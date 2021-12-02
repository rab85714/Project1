<?php
  require('./database.php');
  session_start();
?>

<!DOCTYPE html>

<html lang="en">

<head>
</head>
<body>
<?php
  if (isset($_POST['remove'])) {
    $itemIdRaw = filter_input(INPUT_POST, 'itemId');
    // TODO : itemId is not being grabbed from the remove button
    $itemId = $itemIdRaw[0];
    $email = $_SESSION['email'];
    $userQuery = "SELECT * FROM user WHERE email = :email";
    $userPrep = $db->prepare($userQuery);
    $userPrep->bindParam(':email', $email, PDO::PARAM_STR);
    $userId = $userPrep->execute();

    $insertQuery = "DELETE FROM cart WHERE cart.id = :userId AND cart.itemId = :itemId";
    $insert = $db->prepare($insertQuery);
    $insert->bindParam(':userId', $userId, PDO::PARAM_INT);
    $insert->bindParam(':itemId', $itemId, PDO::PARAM_INT);
    $result = $insert->execute();

    header('location: cart.php');
  }
?>
</body>
</html>