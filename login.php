<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Mario's Bistro Login</title>
  <link rel="stylesheet" href="login.css">
  <style>


  </style>
</head>
<body>
  <br>
    <div id="loginBox">
      <form action='loginProcess.php' method='post'>
        <h1>Welcome to Mario's Bistro!</h1>
        <h3>Log In</h3>

        <div>
          <span>email:</span>
          <input type="text" id="email" name="email" required autofocus></div>
          <br>
        <div>
          <span>password:</span>
          <input type="password" id="password" name="password" required></div>
          <br>
        <div>
          <div><input id="submitButton" onclick="myFunction()" type="submit" value="Login" name = "Login"></div>
          <br>
        </div>
        </form>
        <form action="./index.php"><input type="submit" value="Continue as Guest"></form>

        <p id=demo></p>

    </div>

<script>
function myFunction() {

  // get value of the email input
  let x = document.getElementById("email").value;
  let y = document.getElementById("password").value;
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  //if email is blank, send this error
  if (x=="") {
    alert("Please enter your email.");
  } else if (y=="") {
    alert("Please enter your password.");
  } else if (x=="" & y=="") {
    alert("Please enter you email and password.");
  } else if (!(x.match(mailformat)) && x!="") {
    alert("Please enter a valid email address.");
  } else {

  }

}
</script>

</body>
</html>
