<?php
  include('database.php');

  $email = filter_input(INPUT_POST, 'email');
  $password = filter_input(INPUT_POST, 'password');

  $query = "SELECT * FROM user";
  $users = $db->query($query);

  $isValid = FALSE;

  foreach($users as $user):
  	if($user['email'] == $email && $user['password'] == $password) {
  		$isValid = TRUE;
  		break;
  	}
  endforeach;

  if ($isValid) {
    session_start();
  	$_SESSION['email'] = $email;
  	header("location: index.php");
  } else {
      header("location: login.php");
  }
?>
