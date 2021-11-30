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
    $itemId = filter_input(INPUT_POST, 'itemId');
    print $itemId[0] . " " . $itemId[1] . "<br>";
    $email = $_SESSION['email'];
    $userQuery = "SELECT * FROM user WHERE email = :email";
    $userPrep = $db->prepare($userQuery);
    $userPrep->bindParam(':email', $email, PDO::PARAM_STR);
    $userId = $userPrep->execute();
    print $userId[0] . " " . $userId[1] . "<br>";

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