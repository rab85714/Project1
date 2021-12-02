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
    $itemId = $itemIdRaw[0];
    $email = $_SESSION['email'];
    $userQuery = "SELECT * FROM user WHERE email = :email";
    $userPrep = $db->prepare($userQuery);
    $userPrep->bindParam(':email', $email, PDO::PARAM_STR);
    $userId = $userPrep->execute();

    $numAlreadyInCartQuery = "SELECT * FROM cart WHERE cart.id = $userId AND cart.itemId = $itemId";
    $temp =$db->query($numAlreadyInCartQuery);
    $count = $temp->rowCount();
    print "count " . $count . "<br>";
    if ($count == 0){
        $insertQuery = "INSERT INTO cart (id, itemId, quantity) VALUES (:userId, :itemId, 1)";
        $insert = $db->prepare($insertQuery);
        $insert->bindParam(':userId', $userId, PDO::PARAM_INT);
        $insert->bindParam(':itemId', $itemId, PDO::PARAM_INT);
        $result = $insert->execute();
    } else {
        $increaseQuantityQuery = "UPDATE cart SET quantity = quantity + 1 WHERE cart.id = :userId AND cart.itemId = :itemId";
        print "item id: " . $itemId . "<br>";
        $increaseQuantity = $db->prepare($increaseQuantityQuery);
        $increaseQuantity->bindParam(':userId', $userId, PDO::PARAM_INT);
        $increaseQuantity->bindParam(':itemId', $itemId, PDO::PARAM_INT);
        $result = $increaseQuantity->execute();
    }

    header('location: cart.php');
  }
?>
</body>
</html>