<?php
  require('./database.php');
  session_start();

  $email = $_SESSION['email'];
  if (!isset($email)) {
    header("location: login.php");
  }

  if (isset($_POST['checkout'])) {
      $totalRaw = filter_input(INPUT_POST, 'total');
      $total = $totalRaw[0];
      if($total == 0){
        header("location: cart.php");
      }
  }

  $queryLocations = "SELECT * FROM locations";
  $locations = $db->query($queryLocations);
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <title>My Cart</title>
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="checkout.css">
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
    <table id="moveRight">
      <form action="checkoutProcess.php" method="post">
        <tr>
            <td>
                <h1> Pick a location: </h1>
            </td>
        </tr>
        <?php foreach ($locations as $location) :?>
            <tr class="location_row">
                <td>
                    <input type="radio" name="radioLocation" value="<?php echo $location['name']?>">
                    <label> <?php echo $location['name']; ?> </label>
                </td>
            <tr>
                <td><?php echo $location['streetNumber'] . " " . $location['streetName'] . ", " . $location['city'] . ", " . $location['state'] . " " . $location['zipCode']; ?></td>
            </tr>
            </tr>
        <?php endforeach;?>

        <br>

        <tr>
            <td>
                <h1> Pick a payment method: </h1>
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="radioPayment" value="cash">
                <label> Cash in store </label>
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="radioPayment" value="card">
                <label> Card in store </label>
            </td>
        </tr>
        <tr><td>
            <input id="proceedToCheckoutButton" type="submit" name="submitCheckout" value="Proceed To Checkout">
        </tr></td>
      </form>
    </table>

    <footer>
    	<nav id="socials">
    	  <a style="color: white"> Contact Us Here: </a>
    	  <a class="link" href = "" target="_blank"> Email </a>
    	  <a class="link" href = "" target="_blank"> Phone Number </a>
    	</nav>
    </footer>

</body>
</html>
