<?php
      require('database.php');
      session_start();

      $queryLocations = "SELECT * FROM locations";
      $locations = $db->query($queryLocations);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Restaurant</title>
        <link rel="stylesheet" href="index.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>

    <body class="container-fluid">

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

      <div style="padding-bottom:20px">


	</div>

      <?php foreach ($locations as $location):?>
        <div>
          <p><?php echo $location['name']; ?></p><br>
          <p><?php echo $location['streetNumber'] . " " . $location['streetName'] . ", " . $location['city'] . ", " . $location['state'] . " " . $location['zipCode']; ?>
        </div>
      <?php endforeach; ?>

      <footer>
      	<nav id="socials">
      	  <a style="color: white"> Contact Us Here: </a>
      	  <a class="link" href = "" target="_blank"> Email </a>
      	  <a class="link" href = "" target="_blank"> Phone Number </a>
      	</nav>
      </footer>

    </body>
</html>
