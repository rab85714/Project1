<?php
  require('./database.php');
  session_start();

  $email = $_SESSION['email'];
  if (!isset($email)) {
    header("location: login.php");
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
    <table>
      <tr>
        <h1> Pick a location. </h1>
      </tr>
      <form action="menu.php" method="post">
        <?php
        foreach ($locations as $location) :?>
          <tr class="location_row">
                    <td>
                        <a><input type="hidden" name="pickUpLocation" value="<?php echo $location['id']?>"></a>
                        <input type="radio">
                        <label> <?php echo $location['name']; ?> </label>

                    </td>
                    <tr>
                        <td><?php echo $location['streetNumber'] . " " . $location['streetName'] . ", " . $location['city'] . ", " . $location['state'] . " " . $location['zipCode']; ?></td>
                    </tr>
          </tr>
          <?php endforeach;?>
          <tr>
            <a><input type="submit" value="Place Order"></a>
          </tr>
      </form>
    </table>

    <script>
        function clickAlert() {
            confirm("Alert!");
        }
    </script>
</body>
</html>