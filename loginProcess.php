<?php
  include('database.php');

	$email = filter_input(INPUT_POST, 'email');
  $password = filter_input(INPUT_POST, 'password');

  $query = "SELECT * FROM user";
  $info = $db->query($query);

  $boo = FALSE;

  foreach($info as $user):
  	if($user['Email'] == $email && $user['Password'] == $password) {
  		$boo = TRUE;
  		break;
  	}
  endforeach;

  if ($boo) {
      session_start();
  	$_SESSION['Email'] = $email;
  	header("location: menu.php");

  } else {
      header("location: login.php");
  }
?>
