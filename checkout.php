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
    <div class="plainBackground">
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
    </div>

    <footer>
    	<nav id="socials">
    	  <a class="contact" href=#> Contact Us Here: </a>
    	  <a onclick="displayEmail()" class="link" href = ""> Email </a>
    	  <a onclick="displayPhoneNumber()" class="link" href = ""> Phone Number </a>
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
