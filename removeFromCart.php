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
  if (isset($_POST['remove'])) {
    $itemIdRaw = filter_input(INPUT_POST, 'itemId');
    print $itemIdRaw;
  }
?>
</body>
</html>