<?php
  require('./database.php');
  session_start();

  $email = $_SESSION['email'];
  if (!isset($email)) {
    header("location: login.php");
  }

  $queryCart = "SELECT user.id, cart.itemId, cart.quantity, menuitem.name, menuitem.price FROM cart, user, menuitem
                    WHERE user.email = '$email' AND user.id = cart.id AND cart.itemId = menuitem.id";

  $cart = $db->query($queryCart);
?>

<!DOCTYPE html>

<html lang="en">

<head>
</head>
<body>
    <?php
        if (!isset($_POST['submitCheckout'])) {
            echo '<script> alert("Something went wrong, Please try again.") </script>';
        }

        $total = 0;
        $locationId = 0;
        $paymentName = "";

        if (isset($_POST['radioLocation'])) {
            $locationId = $_POST['radioLocation'] * 1;
            print "location: " . ($locationId * 1) . "<br>";

            $locationQuery = "SELECT
                locations.name,
                locations.streetNumber,
                locations.streetName,
                locations.city,
                locations.state,
                locations.zipCode
                FROM locations WHERE locations.id = '$locationId'";
            $locationPrep = $db->prepare($locationQuery);
            //$locationPrep->bindParam(':locationId', $locationId, PDO::PARAM_INT);
            print "mid query location id: " . $locationId . "<br>";
            $location = $locationPrep->execute();

            print "location query : " . $location . "<br>";
        } else {
            echo ("<script LANGUAGE='JavaScript'>
                window.location.href='checkout.php';
                confirm('Something went wrong, Please try again.');
                </script>");
        }

        if (isset($_POST['radioPayment'])) {
            $paymentName = $_POST['radioPayment'];
            print "payment: " . $paymentName . "<br>";
        } else {
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Something went wrong, Please try again.');
                window.location.href='checkout.php';
                </script>");
        }
    ?>
    <br>
    <table>
        <?php foreach ($cart as $item) :?>
            <tr class="item_row">
                <td><?php $total = $total + $item['price']; ?></td>
                <td> <?php echo $item['name']; ?></td>
                <td>
                    <?php echo $item['quantity'] ?>
                </td>
                <?php $itemTotal = $item['price'] * $item['quantity']; ?>
                <td> <?php echo $itemTotal; ?> </td>
                <?php $total = $total + $itemTotal; ?>
            </tr>
        <?php endforeach;?>
    </table>

    <br>
    <p><?php echo "Total: $" . $total;?></p><br>
    <p><?php echo "Payment Method: " . $paymentName . " (in store)"; ?>
    <br>

    <p><?php echo $location['name']; ?></p><br>
    <p><?php echo $location['streetNumber'] . " " . $location['streetName'] . ", " . $location['city'] . ", " . $location['state'] . " " . $location['zipCode']; ?>

    <form action="checkout.php" method="post">
        <a><?php echo "Total: $" . $total; ?></a>
        <a><input type="submit" name="checkout" value="Checkout"></a>
    </form>
</body>
</html>