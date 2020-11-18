<?php
session_start();

include_once("config/config.php");

$_SESSION["domain"] = $domain; 

if(isset($_GET['url'])){


  surl();

}else{
  header("Location: main.php");
}


?>
