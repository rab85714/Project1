<?php
  require('database.php');
  session_start();

  $queryMenu = 'SELECT * FROM menuItem'

  $menuItems = $db->query($queryMenu);
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
         <h1>Our Restaurant</h1>
 	       <nav>
           <a class="link" href = "index.html"> Home </a>
           <a class="link" href = "menu.html"> Menu </a>
           <a class="link" href = "locations.html"> Locations </a>
           <a class="link" href = "other.html"> Other </a>
         </nav>
       </header>

       <div>
         <h2 class="entres_title"> Entres </h2>
         <table>
           <tr>
             <?php foreach ($menuItems as $menuItem): ?>
               <td><a><?php echo $menuItem['name']?></a></td>
             <?php endforeach; ?>
           </tr>

           <tr>
             <?php foreach ($menuItems as $menuItem): ?>
               <td><a><?php echo $menuItem['price']?></a></td>
             <?php endforeach; ?>
           </tr>

           <tr>
             <?php foreach ($menuItems as $menuItem): ?>
               <td><a><?php echo $menuItem['description']?></a></td>
             <?php endforeach; ?>
           </tr>
       </div>


       <footer>
         <nav id="socials">
           <a style="color: white"> Social Medias: </a>
           <a class="link" href = "" target="_blank"> LinkedIn </a>
           <a class="link" href = "" target="_blank"> Facebook </a>
           <a class="link" href = "" target="_blank"> Instagram </a>
         </nav>
       </footer>

     </body>
 </html>
