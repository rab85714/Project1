<?php
  require('./database.php');
  session_start();

  $email = $_SESSION['email'];
  if (!isset($email)) {
    header("location: login.php");
  }
  $queryCart = "SELECT * FROM cart, user, menuitem
    WHERE user.email = '$email' AND user.id = cart.id AND cart.itemId = menuitem.id";

  $cart = $db->query($queryCart);
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <title>My Cart</title>
</head>

<body>
  <header>
    <h1>Mario's Bistro</h1>
    <nav>
      <a class="link" href = "index.html"> Home </a>
      <a class="link" href = "menu.php"> Menu </a>
      <a class="link" href = "locations.php"> Locations </a>
      <a class="link" href = "cart.php"> My Cart </a>
      <a href="logout.php"> Logout </a>
    </nav>
  </header>

  <div class="grid-container">
        <table>
          <form action="deleteItemCart.php" method="post">

            <tr><th></th><th>Title</th><th>Quantity</th><th>Price</th></tr>
            <tr>
                <?php foreach($cart as $item):?>

                  <td><input type="number" placeholder = 1 min = 1 max = 10></td>
                  <td>$<?php echo $item['price']?></td>
                  <td><input type="submit" name = "delete_item" value="X"></td>
                <?php endforeach;?>



            </tr>
            <tr><td></td><td></td><td>Order Total: $21.98</td><td></td><td><a href="checkout.php"><input type=button value="Checkout"></a></td></tr>
          </form>
        </table>
      </div>
    </div>
    <div class="page-right">
    </div>
  </div>
</body>

</html>
