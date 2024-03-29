<?php
  require('database.php');
  session_start();

  $queryMenu = 'SELECT * FROM menuItem';

  $items = $db->query($queryMenu);
 ?>

 <!DOCTYPE html>
 <html>
    <head>
        <title class="headTitle">Mario's Bistro</title>
        <link rel="stylesheet" href="menuItems.css">
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>
    <body>
    <header>
        <h1 >Mario's Bistro</h1>
 	    <nav>
            <a class="link" href = "index.php"> Home </a>
            <a class="link" href = "menu.php"> Menu </a>
            <a class="link" href = "locations.php"> Locations </a>
            <a class="link" href = "cart.php"> My Cart </a>
            <?php
            $isLoggedIn = "Login";
            $phpPage = "login.php";
            if (isset($_SESSION['email'])) {
                $isLoggedIn = "Logout";
                $phpPage = "logout.php";
                $email = $_SESSION['email'];
            }
            ?>
            <a class="link" href=<?php echo $phpPage ?>>  <?php echo $isLoggedIn ?> </a>
        </nav>
    </header>

    <div class="main" id="content-wrap">
    <div class="title">
        <h2> Menu </h2>
    </div>
        <div class="grid-container">
            <?php $count = 0 ?>
            <?php foreach ($items as $item): ?>
                <div class="item-box" class="container">
                    <?php $count = $count + 1; ?>
                    <p class="menuItemTitles"><?php echo $item['name']?></p>
                    <p><?php echo $item['price']?></p>
                    <p><?php echo $item['description']?></p>
                    <form action="addToCart.php" method="post" class="form-center">
                        <input type="hidden" name="itemId" value="<?php echo $item['id']?>">
                        <a><input class="add-button" type="submit" name="add" value="Add To Cart"></a>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
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
