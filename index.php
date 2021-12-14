<?php
  require('database.php');
  session_start();
  ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Mario's Bistro</title>
	<link rel="stylesheet" href="index.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>

    <body>

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

      <div class="homepage">

  <h1> A little about us: </h1>
	<p id="aboutParagraph">
	  Mario's Bistro was established back in 1968.  We are a small italian pasta
    joint on side of Via Del Corso Italy and the people loved us!  We have recently
    poped up a new location in the heart of Athens Georgia! Our mission is to share
    the taste of authentic italian cuisine with the world!
	</p>
      </div>

<div class="row">
   <div class="column">
      <img src="CaesarSalad.jpeg" alt="salad" style="width:100%">
    </div>
    <div class="column">
      <img src="Pesto.jpeg" alt="pasta" style="width:100%">
    </div>
    <div class="column">
      <img src="bread.jpeg" alt="bread" style="width:100%">
    </div>
 </div>

<style>
img {
    float: left;
    width:  100px;
    height: 300px;
    object-fit: cover;
}
</style>

<footer>
	<nav id="socials">
	  <a style="color: white"> Contact Us Here: </a>
	  <a onclick="displayEmail()" class="link" href=""> Email </a>
	  <a onclick="displayPhoneNumber()" class="link" href=""> Phone Number </a>
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
