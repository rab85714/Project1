<?php
  require('./database.php');
  session_start();

  $email = $_SESSION['email'];
  if (!isset($email)) {
    header("location: login.php");
  }

  $userQuery = "SELECT * FROM user WHERE email = :email";
  $userPrep = $db->prepare($userQuery);
  $userPrep->bindParam(':email', $email, PDO::PARAM_STR);
  $userId = $userPrep->execute();

  $queryOrderHistory = "SELECT * FROM orderhistory WHERE id = $userId";

  $orderHistory = $db->query($queryOrderHistory);
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
  </nav>
</header>
<body>
  <br>
    <table>
        <?php foreach ($orderHistory as $order) :?>
            <tr>
                <td>
                    <a><?php echo $order['locationName']; ?></a>
                    <a><?php echo $order['cartTotal']; ?></a>
                    <a><?php echo $order['dop']; ?></a>
                </td>
            </tr>
        <?php endforeach;?>
    </table>
    <br>
    <footer>
     <nav id="socials">
       <a style="color: white"> Contact Us Here: </a>
       <a class="link" href = "" target="_blank"> Email </a>
       <a class="link" href = "" target="_blank"> Phone Number </a>
     </nav>
    </footer>
</body>
</html>
