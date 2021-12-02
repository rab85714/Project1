<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Login - Bookstore</title>
  <style>
    body {
      background: #E5E5E5;
      margin: 0;
      padding: 0;
    }
  </style>
</head>
<body>
  <div>
    <div>
      <form action='loginProcess.php' method='post'>
        <div></div>
        <h1>Log In</h1>
        <div></div>
        <div>
          <span>email:</span>
          <input type="text" id="email" name="email" required autofocus></div>
        <div>
          <span>password:</span>
          <input type="password" id="password" name="password" required></div>
        <div>
          <div><input onclick="myFunction()" type="submit" value="Login" name = "Login"></div>
        </div>
        <div>
          <div><a href="menu.php"><span id="e4_316">Cancel</span></a></div>
        </div>
        </form>

        <span><a href="menu.php">Forgot password?</a></span>
        <p id=demo></p>


    </div>
  </div>

<script>
function myFunction() {
  // Get the value of the input field with id="numb"
  let x = document.getElementById("email").value;
  // If x is Not a Number or less than one or greater than 10
  let text;
  if (x=="") {
    text = "Please enter your email.";
  }

  let y = document.getElementById("password").value;

  if (y=="") {
    text = "Please enter your password.";
  }

  if(x=="" & y=="") {
    text = "Please enter you email and password.";
  }

  if (!value) {
    text = "";
  }
  document.getElementById("demo").innerHTML = text;

}
</script>

</body>
</html>
