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
  <title>My Cart</title>
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <style>
    .header {
      font-family: 'Caveat';
      font-size: 24px;
    }

    .options {
      font-family: 'Ovo';
      font-size: 22px;
    }

    .info {
      font-family: 'Ovo';
      font-size: 18px;
    }
  </style>
</head>
<header>
<h1>Mario's Bistro</h1>
  <nav>
    <a class="link" href = "index.php"> Home </a>
    <a class="link" href = "menu.php"> Menu </a>
    <a class="link" href = "locations.php"> Locations </a>
    <a class="link" href = "cart.php"> My Cart </a>
    <a class="link" href="logout.php"> Logout </a>
    <a class="link" href = "orderHistory.php"> View Order History </a>
  </nav>
</header>
<body>
  <div class="grid-container">
    <table>
      <tr>
         <th> Name </th>
         <th> Price </th>
         <th> delete button </th>
      </tr>
    <?php
    $total = 0;
    foreach ($cart as $item) :?>
      <tr class="item_row">
            <td> <?php echo $item['name']; ?></td>
            <td>
                <form action="updateQuantity.php" method="post">
                    <a><input type="number" name="quantity" value = "<?php echo $item['quantity'] ?>" min = 1 max = 10></a>
                    <a><input type="hidden" name="itemId" value="<?php echo $item['itemId']?>"></a>
                    <a><input type="submit" name="update" value="Update Quantity"></a>
                </form>
            </td>
            <?php $itemTotal = $item['price'] * $item['quantity']; ?>
            <td> <?php echo $itemTotal; ?> </td>
            <?php $total = $total + $itemTotal; ?>
            <td>
                <form action="removeFromCart.php" method="post">
                    <a><input type="hidden" name="itemId" value="<?php echo $item['itemId']?>"></a>
                    <a><input type="submit" name="remove" value="X"></a>
                </form>
            </td>
      </tr>
      <?php endforeach;?>

    </table>
    <br>
    <form action="checkout.php" method="post">
        <a><?php echo "Total: $" . $total; ?></a>
        <a><input type="submit" name="checkout" value="Place Order"></a>
    </form>
  </div>

  <footer>
  	<nav id="socials">
  	  <a style="color: white"> Contact Us Here: </a>
  	  <a class="link" href = "" target="_blank"> Email </a>
  	  <a class="link" href = "" target="_blank"> Phone Number </a>
  	</nav>
  </footer>

</body>
</html>
