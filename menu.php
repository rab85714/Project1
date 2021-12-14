<?php
  require('database.php');
  session_start();

  $queryMenu = 'SELECT * FROM menuItem';

  $items = $db->query($queryMenu);
 ?>

 <!DOCTYPE html>

 <html>
     <head>
        <title>Restaurant</title>
        <link rel="stylesheet" href="menuItems.css">
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

       <div>
         <div class="grid-container">
            <?php $count = 0 ?>
            <?php foreach ($items as $item): ?>
                <div class="container">
                    <?php $count = $count + 1; ?>
                    <p class="menuItemTitles"><?php echo $item['name']?></p>
                    <p><?php echo $item['price']?></p>
                    <p><?php echo $item['description']?></p>
                    <form action="addToCart.php" method="post" class="form-center">
                        <a><input type="hidden" name="itemId" value="<?php echo $item['id']?>"></a>
                        <a><input type="submit" name="add" value="Add To Cart"></a>
                    </form>
                </div>
                <p> <?php echo "mod count: " . ($count%4) ?> </p>
                <?php if ($count%4 == 0){?>
                    <br>
                <?php }?>
            <?php endforeach; ?>
         </div>
       </div>

       <footer>
       	<nav id="socials">
       	  <a style="color: white"> Contact Us Here: </a>
       	  <a class="link" href = "" target="_blank"> Email </a>
       	  <a class="link" href = "" target="_blank"> Phone Number </a>
       	</nav>
       </footer>

     </body>
 </html>
