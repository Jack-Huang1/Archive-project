<!doctype html>
<html class="js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>CNUT</title>
  <meta name="description" content="archival platform for the internet">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link href="./css/main.css" type = "text/css" rel="stylesheet">

  <style>
    * {
        box-sizing: border-box;
    }

    /* Add padding to containers */
    .container {
      padding: 16px;
      background-color: white;
      margin: 0 auto;
      width: 65%;
    }

    /* Full-width input fields */
    .container input[type=text], input[type=password] {
      width: 100%;
      padding: 10px;
      display: inline-block;
      border: none;
      background: #f1f1f1;
    }

    .container input[type=text]:focus, input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Set a style for the submit button */
    .loginbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    .loginbtn:hover {
        opacity: 1;
    }

    /* Add a blue text color to links */
    a {
        color: dodgerblue;
    }

    /* Set a grey background color and center the text of the "sign in" section */
    .register {
        background-color: #f1f1f1;
        text-align: center;
        padding-top: 1rem;
        padding-bottom: 1rem;
    }
  </style>
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->

<?php
// define variables and set to empty values
$userErr = $pswErr = "";
$user = $psw = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["user"])) {
    $userErr = "* Please enter your username";
  } else {
    $user = test_input($_POST["user"]);
  }

  if (empty($_POST["psw"])) {
    $pswErr = "* Please enter your password";
  } else {
    $psw = test_input($_POST["psw"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

  <h1 class="banner">
    CNUT WIKI
  </h1>

  <div class="topnav">
    <a class="active" href="index.html">Home</a>
    <a href="./bertovone.html" type="html">Hot</a>
    <div class="dropdown">
      <button class="dropbtn"><a href="./archive.html" type="html">Archive</a>
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <div class="row">
          <div class="column">
            <a href="#">Link 1</a>
            <a href="#">Link 2</a>
          </div>
          <div class="column">
            <a href="#">Link 1</a>
            <a href="#">Link 2</a>
          </div>
          <div class="column">
            <a href="#">Link 1</a>
            <a href="#">Link 2</a>
          </div>
          <div class="column">
            <a href="#">Link 1</a>
            <a href="#">Link 2</a>
          </div>
          <div class="column">
            <a href="#">Link 1</a>
            <a href="#">Link 2</a>
          </div>
          <a href = "./archive.html" type ="html" style="float: right; background-color: inherit; color: black">More...</a>
        </div>
      </div>
    </div>

    <input type="text" placeholder="Search...">

    <a href="login.php" type="html" class="acctlinks">Login</a>
    <a href="registration.php" type="html" class="acctlinks">Sign Up</a>
  </div>
  
  <div class="content">

    <form name = "login" method=post action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

      <div class="container">

          <h1 style="text-align: center;">Login</h1>
          <hr>
          
          <label for="user"><b>User</b></label>
          <span class="error"><?php echo $userErr;?></span>
          <span style="width: 100%; margin: 5px 0 22px 0; display: inline-block; border: none; background: #f1f1f1;">
            <input type="text" placeholder="Enter Username" name="user">
          </span>

          <label for="psw"><b>Password</b></label>
          <span class="error"><?php echo $pswErr;?></span>
          <span style="width: 100%; margin: 5px 0 22px 0; display: inline-block; border: none; background: #f1f1f1;">
            <input type="password" placeholder="Enter Password" name="psw">
          </span>

          <hr>
          <button type="submit" class="loginbtn">Login</button>

          <div class="register">
            <p>Don't have an account? <a href="registration.php">Sign Up</a>!</p>
          </div>
      </div>
    </form>
    
  </div>

  <footer class="footer">
    <h4>ABOUT</h4>
  </footer>


   <!-- boilerplate scripts -->
  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>
