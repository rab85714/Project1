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
            if (isset($_POST['radioLocation'])) {
                print "location: " . $_POST['radioLocation'] . "<br>";
            }
            if (isset($_POST['radioPayment'])) {
                print "payment: " . $_POST['radioPayment'] . "<br>";
            }
        }
    ?>
</body>
</html>