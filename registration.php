<!doctype html>
<html class="js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>CNUT</title>
  <meta name="description" content="archival platform for the internet">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link href="./css/main.css" type = "text/css" rel="stylesheet">
  <link rel="STYLESHEET" type="text/css" href="pwdwidget.css" />
  <script src="pwdwidget.js" type="text/javascript"></script>
  <style>
    * {
        box-sizing: border-box;
    }

    /* Add padding to containers */
    .container {
        padding: 16px;
        background-color: white;
        margin: auto;
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
    .registerbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    .registerbtn:hover {
        opacity: 1;
    }

    /* Add a blue text color to links */
    a {
        color: dodgerblue;
    }

    /* Set a grey background color and center the text of the "sign in" section */
    .signin {
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
$nameErr = $userErr = $emailErr = $pswErr = $repswErr = "";
$name = $username = $email = $psw = $repsw = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["username"])) {
    $userErr = "Name is required";
  } else {
    $username = test_input($_POST["username"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
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
    <a class="active" href="./index.html">Home</a>
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
  </div>

  <div class="content" style="height: 800px">
  
      <form name = "register" method=post action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <div class="container">

          <h1 style="text-align: center;">Register</h1>
          <p style="text-align: center;">Please fill in this form to create an account.</p>
          <hr>



          <label for="name"><b>Name</b></label>
          <span style="width: 100%; margin: 5px 0 22px 0; display: inline-block; border: none; background: #f1f1f1;">
            <input type="text" placeholder="Enter Name" name="name">
          </span>
          <span class="error"><?php echo $nameErr;?></span><br>


          <label for="username"><b>Username</b></label>
          <span style="width: 100%; margin: 5px 0 22px 0; display: inline-block; border: none; background: #f1f1f1;">
            <input type="text" placeholder="Enter Username" name="username">
          </span>
          <span class="error"><?php echo $userErr;?></span><br>


          <label for="email"><b>Email</b></label>
          <span style="width: 100%; margin: 5px 0 22px 0; display: inline-block; border: none; background: #f1f1f1;">
            <input type="text" placeholder="Enter Email" name="email">
          </span>
          <span class="error"><?php echo $emailErr;?></span><br>


          <label for='regpwd'><b>Password</b></label> <br />
          <div class='pwdwidgetdiv' id='thepwddiv'></div>
          <script>
            var pwdwidget = new PasswordWidget('thepwddiv','regpwd');
            pwdwidget.MakePWDWidget();
          </script>
          <noscript>
            <div><input type='password' id='regpwd' name='regpwd' /></div>
          </noscript>
          <br>

          
          <label for="psw-repeat"><b>Repeat Password</b></label>
          <span style="width: 100%; margin: 5px 0 22px 0; display: inline-block; border: none; background: #f1f1f1;">
            <input type="password" placeholder="Repeat Your Password" name="psw-repeat">
          </span>
          <span class="error"><?php echo $repswErr;?></span><br>
          <hr>

          <button type="submit" class="registerbtn">Register</button>

          <div class="signin">
          <p>Already have an account? <a href="#">Sign in</a>.</p>
        </div>
        </div>
      </form>

      <footer class="footer">
        <h4>ABOUT</h4>
      </footer>
  </div>


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
