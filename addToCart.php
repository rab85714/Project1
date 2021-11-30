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
  if (isset($_POST['add'])) {
    $itemIdRaw = filter_input(INPUT_POST, 'itemId');
    $itemId = $itemIdRaw[0] * 1;
    $email = $_SESSION['email'];
    $userQuery = "SELECT * FROM user WHERE email = :email";
    $userPrep = $db->prepare($userQuery);
    $userPrep->bindParam(':email', $email, PDO::PARAM_STR);
    $userId = $userPrep->execute();

    $insertQuery = "INSERT INTO cart (id, itemId) VALUES ($userId, $itemId)";
    $insert = $db->prepare($insertQuery);
    $insert->bindParam(':userId', $userId, PDO::PARAM_INT);
    $insert->bindParam(':itemId', $itemId, PDO::PARAM_INT);
    print "userId " . $userId . "<br>";
    print "itemId " . $itemId . "<br>";
    $result = $insert->execute();

    header('location: cart.php');
  }
?>
</body>
</html>