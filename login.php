<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Mario's Bistro Login</title>
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
        <h1>Welcome!</h1>
        <h3>Log In</h3>

        <div>
          <span>email:</span>
          <input type="text" id="email" name="email" required autofocus></div>
        <div>
          <span>password:</span>
          <input type="password" id="password" name="password" required></div>
        <div>
          <div><input onclick="myFunction()" type="submit" value="Login" name = "Login"></div>
        </div>
        </form>

        <p id=demo></p>

    </div>
  </div>

<script>
function myFunction() {

  // set a text variable to be loaded into the page
  let text;

  // get value of the email input
  let x = document.getElementById("email").value;

  //if email is blank, send this error
  if (x=="") {
    text = "Please enter your email.";
  }

  // if email is invalid email format, send this error
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (!(x.match(mailformat)) {
    text = "Please enter a valid email address.";
  }

  // get value of password input
  let y = document.getElementById("password").value;

  // if password is blank, send this error
  if (y=="") {
    text = "Please enter your password.";
  }


  if(x=="" & y=="") {
    text = "Please enter you email and password.";
  }

  // if text hasn't been assigned an error, leave it blank because no error!
  if(!text) {
    text ="";
  }

  document.getElementById("demo").innerHTML = text;

}
</script>

</body>
</html>
