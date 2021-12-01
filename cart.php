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

<body>

  <div class="grid-container">
        <table>

                <?php foreach($cart as $item):?>
                  <tr>
                     <form action="removeFromCart.php" method="post">
                     <td><a><?php echo $item['name']?></a></td>
                     <td><a><?php echo $item['price']?></a></td>
                     <a><input type="hidden" name="itemId" value="<?php echo $item['id']?>"></a>
                     <td><input type="submit" name = "remove" value="X"></td>
                  </tr>
                  
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