<?php
  require('database.php');
  session_start();

  $queryMenu = 'SELECT * FROM menuItem';
  $queryItemCount = 'SELECT COUNT(name) FROM menuItem';

  $itemNames = $db->query($queryMenu);
  $itemPrices = $db->query($queryMenu);
  $itemDescriptions = $db->query($queryMenu);
  $itemButtons = $db->query($queryMenu);
  $numItems = $db->query($queryItemCount);
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
           <a class="link" href="logout.php"> Logout </a>
         </nav>
       </header>

       <div>
         <h2 class="entres_title"> Entres </h2>
         <table>
           <tr>
             <?php foreach ($itemNames as $item): ?>
               <td><a><?php echo $item['name']?></a></td>
             <?php endforeach; ?>
           </tr>

           <tr>
             <?php foreach ($itemPrices as $item): ?>
               <td><a><?php echo $item['price']?></a></td>
             <?php endforeach; ?>
           </tr>

           <tr>
             <?php foreach ($itemDescriptions as $item): ?>
               <td><a><?php echo $item['description']?></a></td>
             <?php endforeach; ?>
           </tr>

           <tr>
             <?php foreach($itemButtons as $item): ?>
                <td>
                  <form action="addToCart.php" method="post">
                    <a><input type="hidden" name="itemId" value="<?php echo $item['id']?>"></a>
                    <a><input type="submit" name="add" value="Add To Cart"></a>
                  </form>
                </td>
             <?php endforeach; ?>
           </tr>
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
