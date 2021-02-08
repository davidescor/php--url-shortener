<?php
session_start();

include_once("config/database/accesbd.php");
include_once("config/config.php");


$urlcode = $_POST["urlcode"];

$shorturl=generarCodigos(1,5); 


obtenir_inicialitzacions_bd($servidor, $usuari, $contrasenya, $bd);

$connect = connectar_BD($servidor, $usuari, $contrasenya, $bd);
    if ($connect)
      {
        if(isset($_SESSION['email']))
        {
          $mail = $_SESSION["email"];
        }else{
          $mail = "ghost";
        }




        $sql = "SELECT shorturl FROM url WHERE shorturl='$shorturl'";

        $result = mysqli_query($connect,$sql);

        $num_row = mysqli_num_rows($result);

        if ($num_row == "0")
        {

            $sql3 = "insert INTO url (user,url,shorturl,hit)VALUES('$mail', '$urlcode', '$shorturl',0)";

            if (mysqli_query($connect,$sql3))
            { 
                if(isset($_SESSION['email']))
                  {
                    header("Location: dashboard.php");
                  }else{
                    header("Location: shared.php");

                    $_SESSION["urlcode"] = $urlcode;
                    $_SESSION["shorturl"] = $shorturl; 
                  }
            }
        }
        else
        {
          echo "1";
        }
   }
?>