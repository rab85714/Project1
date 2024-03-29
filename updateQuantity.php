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

        $userQuery = "SELECT * FROM user WHERE email = :email";
        $userPrep = $db->prepare($userQuery);
        $userPrep->bindParam(':email', $email, PDO::PARAM_STR);
        $userId = $userPrep->execute();

        $increaseQuantityQuery = "UPDATE cart SET quantity = :newQuantity WHERE cart.id = :userId AND cart.itemId = :itemId";
        $increaseQuantity = $db->prepare($increaseQuantityQuery);
        $increaseQuantity->bindParam(':userId', $userId, PDO::PARAM_INT);
        $increaseQuantity->bindParam(':itemId', $itemId, PDO::PARAM_INT);
        $increaseQuantity->bindParam(':newQuantity', $itemQuantity, PDO::PARAM_INT);
        $result = $increaseQuantity->execute();

        header('location: cart.php');
    }
?>
</body>
</html>