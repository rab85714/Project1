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
    if (isset($_POST['checkout'])) {
        if(isset($_POST['cartTotal'])){
            $cartTotal = "$" . $_POST['cartTotal'];
        } else {
            $cartTotal = ":( <br>";
        }
        if(isset($_POST['cart'])) {
            $locationName = $_POST['cart'];
        } else {
            $locationName = "sadness"
        }
        print "total: " . $cartTotal . "<br>";
        print "loc: " . $locationName . "<br>";
        $email = $_SESSION['email'];

        $userQuery = "SELECT * FROM user WHERE email = :email";
        $userPrep = $db->prepare($userQuery);
        $userPrep->bindParam(':email', $email, PDO::PARAM_STR);
        $userId = $userPrep->execute();

        $date = date('l jS \of F Y');

        /* $queryAddToOrderHistory = "INSERT INTO orderhistory VALUES
            (:cartTotal, :dop, :id, :locationName)";
        $AddToOrderHistory = $db->prepare($queryAddToOrderHistory);
        $AddToOrderHistory->bindParam(':cartTotal', $cartTotal, PDO::PARAM_STR);
        $AddToOrderHistory->bindParam(':dop', $date, PDO::PARAM_STR);
        $AddToOrderHistory->bindParam(':id', $userId, PDO::PARAM_INT);
        $AddToOrderHistory->bindParam(':locationName', $locationName, PDO::PARAM_SRT);
        $result = $AddToOrderHistory->execute(); */

        header('location: cart.php');
    }
?>

</body>
</html>