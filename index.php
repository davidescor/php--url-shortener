<?php
session_start();

include_once("php/model.php");


if(isset($_GET['url'])){


  surl();

}else{
  header("Location: main.php");
}


?>
