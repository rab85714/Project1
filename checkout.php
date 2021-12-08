<?php
  require('./database.php');
  session_start();

  $email = $_SESSION['email'];
  if (!isset($email)) {
    header("location: login.php");
  }
?>

<!DOCTYPE html>

<html lang="en">

<head>
</head>
<body>
<?php echo "page works"; ?>
</body>
</html>