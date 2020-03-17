<?php

date_default_timezone_set('Europe/Madrid');

header("Content-Type: text/html;charset=ansi");

include_once("config/database/accesbd.php");
include_once("config/func/func.php");


function obtenir_inicialitzacions_bd(&$servidor, &$usuari, &$contrasenya, &$bd)
{
    $servidor    = "localhost";
    $usuari      = "root";
    $contrasenya = "usbw";
    $bd          = "shorturl";
}



?>