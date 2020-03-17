<?php
session_start();

include_once("config/config.php");


if(isset($_GET['url'])){


  surl();

}else{
  header("Location: main.php");
}


?>
