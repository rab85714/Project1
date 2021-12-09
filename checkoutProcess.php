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
        if (isset($_POST['submitCheckout'])) {
            print "yay";
        }
    ?>
</body>
</html>