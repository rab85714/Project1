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
  <title>Mario's Bistro</title>
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
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
    <div class="plainBackground" id="content-wrap">
        <h1 style="text-align:center"> Order History </h1>
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
    </div>
    <footer>
     <nav id="socials">
       <a class="contact" href=#> Contact Us Here: </a>
       <a onclick="displayEmail()" class="link" href = ""  > Email </a>
       <a onclick="displayPhoneNumber()" class="link" href = ""  > Phone Number </a>
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
