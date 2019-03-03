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

function gamelist()
{
    $res = false;
    obtenir_inicialitzacions_bd($servidor, $usuari, $contrasenya, $bd);
    $connexio = connectar_BD($servidor, $usuari, $contrasenya, $bd);
    if ($connexio)
      {
        $instruccio = "SELECT * FROM game";

        $consulta   = consulta_multiple($connexio, $instruccio);
        $fila = obtenir_fila($consulta);
        
        while ($fila)
              {
                echo '<div class="col-md-3 filter TODOS NINTENDO shadowB">
                        <a href="game.php" class="custom-card">
                        <div class="card" style="border: none;">
                        <img class="card-img-top" src="'.$fila[6].'" alt="Card image cap">
                        <p class="nameGame">'.$fila[1].'</p>
                        <p class="points">+'.$fila[4].' PUNTOS DE COMPRA</p>
                        <p class="precio">'.$fila[5].'</p>
                        </div>
                        </a>
                      </div>';
                //echo "<p class='ofertas_esta'>OFERTAS EN TOTAL : ".$fila[0]."</p>";
                $fila = obtenir_fila($consulta);
              }
          
        
        tancar_consulta_multiple($consulta);
      }
    desconnectar_bd($connexio);
    return ($res);
}
