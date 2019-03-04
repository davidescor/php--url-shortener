<?php
session_start();

include_once("php/accesbd.php");
include_once("php/model.php");


$urlcode = $_POST["urlcode"];


function generarCodigos($cantidad=3, $longitud=10, $incluyeNum=true){ 
    $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
    if($incluyeNum) 
        $caracteres .= "1234567890"; 
     
    $arrPassResult=array(); 
    $index=0; 
    while($index<$cantidad){ 
        $tmp=""; 
        for($i=0;$i<$longitud;$i++){ 
            $tmp.=$caracteres[rand(0,strlen($caracteres)-1)]; 
        } 
        if(!in_array($tmp, $arrPassResult)){ 
            $arrPassResult[]=$tmp; 
            $index++; 
        } 
    } 
    return $tmp; 
}  

$shorturl=generarCodigos(1,5); 



  $connect = mysqli_connect("localhost", "root", "usbw", "urlshort");

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

      //$pass_hash = hash("md5","$pass");       

      $sql3 = "insert INTO url (user,url,shorturl,hit)VALUES('$mail', '$urlcode', '$shorturl',0)";

      if (mysqli_query($connect,$sql3))
      { 
          if(isset($_SESSION['email']))
            {
              header("Location: dashboard.php");
            }else{
              header("Location: anonymous.php");

              $_SESSION["urlcode"] = $urlcode;
              $_SESSION["shorturl"] = $shorturl; 
            }
      }
  }
  else
  {
    echo "1";
  }
