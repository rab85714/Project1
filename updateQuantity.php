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
    if (isset($_POST['update'])) {
        $itemIdRaw = filter_input(INPUT_POST, 'itemId');
        $itemId = $itemIdRaw[0];
        $itemQuantityRaw = filter_input(INPUT_POST, 'quantity');
        $itemQuantity = $itemQuantityRaw[0];
        $email = $_SESSION['email'];
//todo quantity is not correct. 
        $userQuery = "SELECT * FROM user WHERE email = :email";
        $userPrep = $db->prepare($userQuery);
        $userPrep->bindParam(':email', $email, PDO::PARAM_STR);
        $userId = $userPrep->execute();
        print "user id: " . $userId . "<br>";
        print "item id: " . $itemId . "<br>";
        print "quantity: " . $itemQuantity . "<br>";
    }
?>
</body>
</html>