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

    print "item id " . $itemId . "<br>";
    print "user Id " . $userId;
  }
?>
</body>
</html>