<?php
  require('./database.php');
  session_start();

  $email = $_SESSION['email'];
  if (!isset($email)) {
    header("location: login.php");
  }

  $queryCart = "SELECT user.id, cart.itemId, cart.quantity, menuitem.name, menuitem.price FROM cart, user, menuitem
                    WHERE user.email = '$email' AND user.id = cart.id AND cart.itemId = menuitem.id";
  $queryLocations = "SELECT * FROM locations";

  $locations = $db->query($queryLocations);
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
            $locationId = ($_POST['radioLocation'] + 0);
        } else {
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Please select a location and a payment method.');
                window.location.href='checkout.php';
                </script>");
        }

        if (isset($_POST['radioPayment'])) {
            $paymentName = $_POST['radioPayment'];
        } else {
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Please select a location and a payment method.');
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
    <?php foreach ($locations as $location):?>
        <?php if ($location['id'] == $locationId) { ?>
        <p><?php echo $location['name']; ?></p><br>
        <p><?php echo $location['streetNumber'] . " " . $location['streetName'] . ", " . $location['city'] . ", " . $location['state'] . " " . $location['zipCode']; ?>
        <?php } ?>
    <?php endforeach; ?>
    <form action="checkout.php" method="post">
        <a><?php echo "Total: $" . $total; ?></a>
        <a><input type="submit" name="checkout" value="Checkout"></a>
    </form>
</body>
</html>