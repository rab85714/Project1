<?php
  require('./database.php');
  session_start();
?>

<!DOCTYPE html>

<html lang="en">

<head>
</head>
<body>
    <?php
      $itemId = filter_input(INPUT_POST, 'id');
      if ($itemId > 0){
          $userIdQuery = "SELECT id FROM user WHERE email = '{$_SESSION['email']}'";

          $queryInsert = "INSERT INTO cart VALUES (1, '$itemId')";
          $insert = $db->query($queryInsert);
          header("Location: cart.php");
      }
    ?>
    <p><?php echo $itemId ?></p>
</body>
</html>