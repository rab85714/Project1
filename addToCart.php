<?php
  require('./database.php');
  session_start();

  $query = 'INSERT INTO cart VALUES (1, 1)';
  $info = mysqli_query($db, $query);
  $resultCheck = mysqli_num_rows($info);

  if ($resultCheck > 0){
    header("location: cart.php");
  }
  header("location: logout.php");
?>