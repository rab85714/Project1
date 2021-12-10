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
            $cartTotalRaw = filter_input(INPUT_POST, 'cartTotal');
            print "cartTotal: " . $cartTotalRaw . "<br>";
            $cartTotal = "$" . $CartTotalRaw[0];
            $locationNameRaw = filter_input(INPUT_POST, 'locationName');
            print "locationName: " . $locationNameRaw . "<br>";
            $locationName = $locationNameRaw[0];
            $email = $_SESSION['email'];

            $userQuery = "SELECT * FROM user WHERE email = :email";
            $userPrep = $db->prepare($userQuery);
            $userPrep->bindParam(':email', $email, PDO::PARAM_STR);
            $userId = $userPrep->execute();

            $date = date('l jS \of F Y');

            $queryAddToOrderHistory = "INSERT INTO orderhistory VALUES
                (:cartTotal, :dop, :id, :locationName)";
            $AddToOrderHistory = $db->prepare($queryAddToOrderHistory);
            $AddToOrderHistory->bindParam(':cartTotal', $cartTotal, PDO::PARAM_STR);
            $AddToOrderHistory->bindParam(':dop', $date, PDO::PARAM_STR);
            $AddToOrderHistory->bindParam(':id', $userId, PDO::PARAM_INT);
            $AddToOrderHistory->bindParam(':locationName', $locationName, PDO::PARAM_SRT);
            $result = $AddToOrderHistory->execute();

            header('location: cart.php');
        }
    ?>

</body>
</html>