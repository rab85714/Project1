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
  <meta charset="utf-8">
  <title>My Cart</title>
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<header>
<title class="headTitle">Mario's Bistro</title>
  <nav>
    <a class="link" href = "index.php"> Home </a>
    <a class="link" href = "menu.php"> Menu </a>
    <a class="link" href = "locations.php"> Locations </a>
    <a class="link" href = "cart.php"> My Cart </a>
    <a class="link" href="logout.php"> Logout </a>
  </nav>
</header>
<body>
    <div class="plainBackground" id="content-wrap">
        <?php
            if (!isset($_POST['submitCheckout'])) {
                echo '<script> alert("Something went wrong, Please try again.") </script>';
            }

            $total = 0;
            $locationName = "";
            $paymentName = "";

            if (isset($_POST['radioLocation'])) {
                $locationName = ($_POST['radioLocation']);
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
        <p><?php echo "Payment Method: " . $paymentName . " (in store)"; ?>
        <br>
        <?php foreach ($locations as $location):?>
            <?php if ($location['name'] == $locationName) { ?>
            <p><?php echo $location['name']; ?></p><br>
            <p><?php echo $location['streetNumber'] . " " . $location['streetName'] . ", " . $location['city'] . ", " . $location['state'] . " " . $location['zipCode']; ?>
            <?php } ?>
        <?php endforeach; ?>
        <form action="addToOrderHistory.php" method="post">
            <a><?php echo "Total: $" . $total; ?></a>
            <input type="hidden" name="cartTotal" value="<?php echo $total ?>">
            <input type="hidden" name="locationName" value="<?php echo $locationName ?>">
            <a><input onclick="foo()" type="submit" name="checkout" value="Checkout"></a>
        </form>
    </div>

    <footer>
        <nav id="socials">
            <a class="contact" href=#> Contact Us Here: </a>
            <a onclick="displayEmail()" class="link" href = ""  > Email </a>
            <a onclick="displayPhoneNumber()" class="link" href = ""  > Phone Number </a>
        </nav>
    </footer>

    <script>
function foo() {
    alert("Checkout Successful!");
    window.location.href = "./menu.php";
  }
    </script>
</body>
</html>
