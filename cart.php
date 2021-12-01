<?php
  require('./database.php');
  session_start();

  $email = $_SESSION['email'];
  if (!isset($email)) {
    header("location: login.php");
  }

  $email = $_SESSION['email'];
  $userQuery = "SELECT * FROM user WHERE email = :email";
  $userPrep = $db->prepare($userQuery);
  $userPrep->bindParam(':email', $email, PDO::PARAM_STR);
  $userId = $userPrep->execute();
  print "user id : " . $userId . "<br>";

  $cartQuery = "SELECT itemId FROM cart WHERE id = :userId";
  $cartPrep = $db->prepare($cartQuery);
  $cartPrep->bindParam(':userId', $userId, PDO::PARAM_INT);
  $cart = $cartPrep->execute();
  print "cart A : " . $cart . "<br>";
  print "cart B : " . $cart[0] . "<br>";
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

                <?php foreach($cart as $cartItemId):?>
                    <?php
                        $menuItemInfoQuery = "SELECT * FROM menuitem WHERE menuitem.id = :cartItemId";
                        $menuItemInfoPrep = $db->prepare($menuItemInfoQuery);
                        $menuItemInfoPrep->bindParam(':cartItemId', $cartItemId, PDO::PARAM_INT);
                        $menuItemInfo = $menuItemInfoPrep->execute();
                    ?>

                      <tr>
                         <form action="removeFromCart.php" method="post">
                         <td><a><?php echo $menuItemInfo['name']?></a></td>
                         <td><a><?php echo $menuItemInfo['price']?></a></td>
                         <a><input type="hidden" name="itemId" value="<?php echo $menuItemInfo['id']?>"></a>

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