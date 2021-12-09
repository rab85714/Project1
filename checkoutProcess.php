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
            $radioPayment = filter_input(INPUT_POST, 'radioPayment', FILTER_SANITIZE_STRING);
            $selectedPayment = $radioPayment[0];

            print "location s: " . $selectedLocation . "<br>";
            print "location r: " . $radioLocation . "<br>";
            print "payment s: " . $selectedPayment . "<br>";
            print "payment r: " . $radioPayment . "<br>";
        }
    ?>
</body>
</html>