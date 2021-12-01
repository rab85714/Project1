<?php
  require('database.php');
  session_start();
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
          <a class="link" href = "index.html"> Home </a>
          <a class="link" href = "menu.php"> Menu </a>
          <a class="link" href = "locations.php"> Locations </a>
          <a class="link" href = "cart.php"> My Cart </a>
          <a href="logout.php"> Logout </a>
        </nav>
      </header>

      <div style="padding-bottom:20px">


	</div>

      <div style="padding-bottom:20px">
          Athens Location <br>
          <address>123 Muffin Man Way <br>
          Athens, GA 30601 </address>
      </div>


      <div style="padding-bottom:20px">
        Atlanta Location <br>
        <address> 456 Another Street <br>
        Atlanta, GA 32098 </address>
      </div>

      <footer>
        <nav id="socials">
          <a style="color: white"> Social Medias: </a>
          <a class="link" href = "" target="_blank"> Twitter </a>
          <a class="link" href = "" target="_blank"> Facebook </a>
          <a class="link" href = "" target="_blank"> Instagram </a>
        </nav>
      </footer>

    </body>
</html>
