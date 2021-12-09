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
                $locationId = $_POST['radioLocation'];
                print "location: " . $locationId . "<br>";
            }
            if (isset($_POST['radioPayment'])) {
                $paymentName = $_POST['radioPayment'];
                print "payment: " . $paymentName . "<br>";
            }
        }
    ?>
</body>
</html>