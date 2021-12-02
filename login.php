<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Mario's Bistro Login</title>
  <style>
    body {
      background: #E5E5E5;
      margin: 0;
      padding: 0;
      text-align: center;
    }
    form h1 {
      margin-top: 50px;
    }

  </style>
</head>
<body>
  <div>
    <div>
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

        <p id=demo></p>

    </div>
  </div>

<script>
function myFunction() {

  // get value of the email input
  let x = document.getElementById("email").value;
  //if email is blank, send this error
  if (x=="") {
    alert("Please enter your email.");
  }

  // get value of password input
  let y = document.getElementById("password").value;

  // if password is blank, send this error
  if (y=="") {
    alert("Please enter your password.");
  }

  if(x=="" & y=="") {
    alert("Please enter you email and password.");
  }

  // if email is invalid email format, send this error
  var mailformat = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
  if (!(x.match(mailformat)) && x!="") {
    alert("Please enter a valid email address.");
  }


}
</script>

</body>
</html>
