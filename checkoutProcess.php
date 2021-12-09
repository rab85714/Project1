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
            $radioLocation = filter_input(INPUT_POST, 'radioLocation');
            $selectedLocation = $radioLocation[0];
            $radioPayment = filter_input(INPUT_POST, 'radioPayment');
            $selectedPayment = $radioPayment[0];

            print "location: " . $selectedLocation . "<br>";
            print "payment: " . $selectedPayment . "<br>";
        }
    ?>
</body>
</html>