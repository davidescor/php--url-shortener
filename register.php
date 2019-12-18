
<?php
session_start();

  if(isset($_SESSION['email']))
  {
    header("Location: main.php");
  }


include_once("php/model.php");


?>
<!DOCTYPE html>
<html lang="es">

  <head>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/ico" />
    <link rel="apple-touch-icon" href="img/favicon.ico" type="image/ico" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicon.ico" type="image/ico">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/favicon.ico" type="image/ico">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicon.ico" type="image/ico">
    <link rel="apple-touch-icon-precomposed" href="img/favicon.ico" type="image/ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>URL SHORTENER - REGISTER</title>

    <!-- BOOTSTRAP CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/surl.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/validate_register.js"></script> 

  </head>

  <body>


<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color bg-blue">
  <a class="navbar-brand" href="main.php">URL SHORTENER</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="basicExampleNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="main.php">HOME</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">ABOUT</a>
      </li>
    </ul>
    <div class="form-inline">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="login.php">LOGIN</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">REGISTER</a>
      </li>
    </ul>
    </div>
  </div>
</nav>


  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center f-45 c-white m-top10">
        REGISTER
      </div>
      <hr>

      <div class="col-md-12 text-center m-top10">
        <form action = "" method = "post">



          <div class="form-group">
              <input type="text" name="username" class="input-lar" id="entryMail" placeholder="example@example.com"> 
              <p class="error" id="mailError">Error mail</p>
          </div>
          <div class="form-group">
            <input type="password" name="password" class="input-lar" id="entryContra" placeholder="**********">
            <p class="error" id="passError">Error password</p>
          </div>

          <p id="invalidCredentials"></p>
          <input id="btn_submit" type="button" value="REGISTER"  class="bt-url">
          <div id="text_message"></div>
        </form>

      </div>
    </div>
  </div>



<footer class="text-center footer">
  <hr class="hr">
  <p class="c-white-footer">URL-SHORTENER © COPYRIGHT BY <a class="no-style" href="www.davidespier.com">DAVID ESPIER</a></p>

</footer>

    <!-- BOOSTRAP JAVASCRIPT -->

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
  </body>

</html>
