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
        }
        if(isset($_POST['locationName'])) {
            $locationName = $_POST['locationName'];
        }
        print "total: " . $cartTotal . "<br>";
        print "loc: " . $locationName  . "<br>";
        $email = $_SESSION['email'];

        $userQuery = "SELECT * FROM user WHERE email = :email";
        $userPrep = $db->prepare($userQuery);
        $userPrep->bindParam(':email', $email, PDO::PARAM_STR);
        $userId = $userPrep->execute();
        print "id: " . $userId . "<br>";

        $date = date('l jS \of F Y');
        print "date: " . $date . "<br>";

        $queryAddToOrderHistory = "INSERT INTO orderhistory VALUES
            (:id, :cartTotal, :locationName, :dop)";
        $AddToOrderHistory = $db->prepare($queryAddToOrderHistory);
        $AddToOrderHistory->bindParam(':id', $userId, PDO::PARAM_INT);
        $AddToOrderHistory->bindParam(':cartTotal', $cartTotal, PDO::PARAM_STR);
        $AddToOrderHistory->bindParam(':locationName', $locationName, PDO::PARAM_STR);
        $AddToOrderHistory->bindParam(':dop', $date, PDO::PARAM_STR);
        $AddToOrderHistory->execute();

        $queryDeleteFromCart = "DELETE FROM cart WHERE id = :id";
        $DeleteFromCart = $db->prepare($queryDeleteFromCart);
        $DeleteFromCart->bindParam(':id', $userId, PDO::PARAM_INT);
        $DeleteFromCart->execute();

        header('location: menu.php');
    }
?>

</body>
</html>
