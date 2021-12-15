<?php
  require('./database.php');
  session_start();

  $email = $_SESSION['email'];
  if (!isset($email)) {
    header("location: login.php");
  }

// this query contains the following variables: id, itemId, quantity, name, and price
  $queryCart = "SELECT user.id, cart.itemId, cart.quantity, menuitem.name, menuitem.price FROM cart, user, menuitem
                    WHERE user.email = '$email' AND user.id = cart.id AND cart.itemId = menuitem.id";

  $cart = $db->query($queryCart);
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <title class="headTitle">Mario's Bistro</title>
  <link rel="stylesheet" href="cart.css">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

</head>
<header>
<h1>Mario's Bistro</h1>
  <nav>
    <a class="link" href = "index.php"> Home </a>
    <a class="link" href = "menu.php"> Menu </a>
    <a class="link" href = "locations.php"> Locations </a>
    <a class="link" href = "orderHistory.php"> View Order History </a>
    <a class="link" href="logout.php"> Logout </a>
  </nav>
</header>
<body>
    <div class="plainBackground" id="content-wrap">
        <div class="title">
            <h2> Cart </h2>
        </div>
        <div>
            <form id="continueShoppingButton" action="./menu.php"><input type="submit" value="Continue Shopping"></form>
        </div>
        <div class="grid-container">
            <table class="cart-table">
                <tr>
                    <th> Name </th>
                    <th> Quantity </th>
                    <th> Price </th>
                </tr>
            <?php
            $total = 0;
            foreach ($cart as $item) :?>
                <tr class="item-row">
                    <td> <?php echo $item['name']; ?></td>
                    <td>
                        <form class="update-form" action="updateQuantity.php" method="post">
                            <a><input type="number" name="quantity" value = "<?php echo $item['quantity'] ?>" min = 1 max = 10></a><br>
                            <input type="hidden" name="itemId" value="<?php echo $item['itemId']?>">
                            <a><input class="update-button" type="submit" name="update" value="Update Quantity"></a>
                        </form>
                    </td>
                    <?php $itemTotal = $item['price'] * $item['quantity']; ?>
                    <td class="price"> <?php echo $itemTotal; ?> </td>
                    <?php $total = $total + $itemTotal; ?>
                    <td>
                        <form action="removeFromCart.php" method="post">
                            <a><input type="hidden" name="itemId" value="<?php echo $item['itemId']?>"></a>
                            <a><input type="submit" name="remove" value="X"></a>
                        </form>
                    </td>
                </tr>
            <?php endforeach;?>
                <tr class="item-row">
                    <?php if ($total == 0) { ?>
                        <td> Your cart is empty silly! </td>
                    <?php } ?>
                    <td> 0 </td>
                    <td> $ 0.00 </td>
                </tr>
            </table>
            <br>
            <form class="place-order" action="checkout.php" method="post">
                <a><?php echo "Total: $" . $total; ?></a>
                <a><input type="hidden" name="total" value="<?php echo $total?>"></a>
                <a><input id="placeOrderButton" type="submit" name="checkout" value="Place Order"></a>
            </form>
        </div>
    </div>

    <footer>
        <nav id="socials">
            <a class="contact" href=#> Contact Us Here: </a>
            <a onclick="displayEmail()" class="link" href = ""  > Email </a>
            <a onclick="displayPhoneNumber()" class="link" href = ""  > Phone Number </a>
        </nav>
    </footer>

</body>
</html>

<script>
// When the user clicks on div, open the popup
function displayEmail() {
  alert("Email us at contactus@mariosbistro.org!");
}

function displayPhoneNumber() {
  alert(" Call us at 111-222-3333!");
}
</script>
