<?php
      require('database.php');
      session_start();

      $queryLocations = "SELECT * FROM locations";
      $locations = $db->query($queryLocations);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Mario's Bistro</title>
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="locations.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>

      <header>
        <h1>Mario's Bistro</h1>
        <nav>
          <a class="link" href = "index.php"> Home </a>
          <a class="link" href = "menu.php"> Menu </a>
          <a class="link" href = "locations.php"> Locations </a>
          <a class="link" href = "cart.php"> My Cart </a>
          <?php
          $email = $_SESSION['email'];
          $isLoggedIn = "Login";
          $phpPage = "login.php";
          if (isset($email)) {
            $isLoggedIn = "Logout";
            $phpPage = "logout.php";
          }
           ?>
          <a class="link" href=<?php echo $phpPage ?>>  <?php echo $isLoggedIn ?> </a>
        </nav>
      </header>

      <h1 style="text-align:center"> Our Locations </h1>

      <div style='text-align: center'>
        <div style = "display: inline-block; vertical-align: top;"> <table>
          <?php foreach ($locations as $location):?>
              <a class="locationNameTitle"><?php echo $location['name'] . "<br>"; ?></a>
              <a><?php echo $location['streetNumber'] . " " . $location['streetName'] . ",<br>"; ?></a>
              <a><?php echo $location['city'] . ", " . $location['state'] . " " . $location['zipCode'] . "<br>"; ?></a>
              <br>
          <?php endforeach; ?>
        </table>
      </div>
      <div style = "display: inline-block; vertical-align: top;">
        <img src="location.jpeg" alt="loc">
      </div>
    </div>

    <footer>
      <nav id="socials">
        <a style="color: white"> Contact Us Here: </a>
        <a onclick="displayEmail()" class="link" href = ""  > Email </a>
        <a onclick="displayPhoneNumber()" class="link" href = ""  > Phone Number </a>
      </nav>
    </footer>

    </body>
</html>

<script>
// When the user clicks on div, open the popup
function displayEmail() {
  alert("contactus@mariosbistro.org");
}

function displayPhoneNumber() {
  alert("111-222-3333");
}
</script>
