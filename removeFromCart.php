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
    print "button click success";
  }
?>
</body>
</html>