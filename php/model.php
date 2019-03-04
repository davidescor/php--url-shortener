<?php
date_default_timezone_set('Europe/Madrid');
header("Content-Type: text/html;charset=ansi");
include_once("php/accesbd.php");

function addGameToShoppingCar(){

}

function obtenir_inicialitzacions_bd(&$servidor, &$usuari, &$contrasenya, &$bd)
{
    $servidor    = "localhost";
    $usuari      = "root";
    $contrasenya = "usbw";
    $bd          = "urlshort";
}

function num_files($res)
{
  $quants = 0;
  if (isset($res) && $res != null)
    {
      $quants = mysqli_num_fields($res);
    }
  return ($quants);
}


function show_urls(){

    $email = $_SESSION["email"];

    $res = false;
    obtenir_inicialitzacions_bd($servidor, $usuari, $contrasenya, $bd);
    $connexio = connectar_BD($servidor, $usuari, $contrasenya, $bd);
    if ($connexio)
      {
        $instruccio = "SELECT * FROM url where user ='".$email."'";

        $consulta   = consulta_multiple($connexio, $instruccio);
        $fila = obtenir_fila($consulta);
        
        while ($fila)
              {
                echo $fila[0]."<br>".$fila[1]."<br>".$fila[2];
                echo "<br><a href='http://localhost:8080/short-url/?url=".$fila[2]."'>http://localhost:8080/short-url/?url=".$fila[2]."</a><br>";
                echo "<br><br>";

                //echo "<p class='ofertas_esta'>OFERTAS EN TOTAL : ".$fila[0]."</p>";
                $fila = obtenir_fila($consulta);
              }
          
        
        tancar_consulta_multiple($consulta);
      }
    desconnectar_bd($connexio);
    return ($res);

}

function surl(){
  $url = $_GET['url'];

  $res = false;
  obtenir_inicialitzacions_bd($servidor, $usuari, $contrasenya, $bd);
  $connexio = connectar_BD($servidor, $usuari, $contrasenya, $bd);

    if ($connexio)
      {

        $instruccio = "SELECT * FROM url WHERE shorturl = '".$url."'";

        $consulta   = consulta_multiple($connexio, $instruccio);
        $fila = obtenir_fila($consulta);
        
        while ($fila)
              {
                header("Location: ".$fila[1]."");
                $fila = obtenir_fila($consulta);
              }
          
        
        tancar_consulta_multiple($consulta);
      }


    desconnectar_bd($connexio);
    return ($res);


}