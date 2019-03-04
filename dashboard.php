<?php
session_start();

  if(!isset($_SESSION['email']))
  {
    header("Location: login.php");
  }


include_once("php/model.php");


?>
<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>URL SHORTENER - DASHBOARD</title>

    <!-- BOOTSTRAP CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/surl.css" rel="stylesheet">


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
        <?php
          if(isset($_SESSION['email'])){
            echo "<a class='nav-link' href='dashboard.php'>";
            echo($_SESSION['email']);
            echo"</a>";
          }
          else{
           echo"<a class='nav-link' href='login.php'>LOGIN</a>";
          }
        ?>
      </li>
      <li class="nav-item">

      <?php
      if(isset($_SESSION['email']))
      {
        echo"<a class='nav-link' href='logout.php'>LOGOUT</a>";
      }
      else
      {
       echo"<a class='nav-link' href='register.php'>REGISTER</a>";
      }

     ?>
      </li>
    </ul>
    </div>
  </div>
</nav>


  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center f-45 c-white m-top10">
        DASHBOARD
      </div>
      <hr>

      <div class="col-md-12 text-center" style="background-color: white;">
          <div class="row">
            <?php
              show_urls();
            ?>
          </div>
      </div>

    </div>
  </div>



<footer class="text-center">
  <hr class="hr">
  <p class="c-white-footer">URL-SHORTENER © COPYRIGHT BY <a class="no-style" href="www.davidespier.com">DAVID ESPIER</a></p>
</footer>

    <!-- BOOSTRAP JAVASCRIPT -->

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
  </body>

</html>
