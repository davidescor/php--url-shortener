<?php

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
    $num = 0;
    $res = false;
    obtenir_inicialitzacions_bd($servidor, $usuari, $contrasenya, $bd);
    $connect = connectar_BD($servidor, $usuari, $contrasenya, $bd);
    if ($connect)
      {
        $instruccio = "SELECT * FROM url where user ='".$email."'";

        $consulta   = consulta_multiple($connect, $instruccio);
        $fila = obtenir_fila($consulta);
        
        while ($fila)
              {
                echo "<div class='col-md-12 f-mail'>"
                .$fila[1].
                "</div>
                <div class='col-md-12 f-link'>
                <a id='num".$num."' href='index.php?url=".$fila[2]."'>your-domain.com/index.php?url=".$fila[2]."</a>";
                echo "</div>";
                echo "<div class='col-md-12 f-mail'>

               <button class='btn bt-url' data-clipboard-action='copy' data-clipboard-target='#num".$num."'>COPY</button>


                </div>";
                $num++;
                echo "<br><br><br>";
                //echo "<p class='ofertas_esta'>OFERTAS EN TOTAL : ".$fila[0]."</p>";
                $fila = obtenir_fila($consulta);
              }
          
        
        tancar_consulta_multiple($consulta);
      }
    desconnectar_bd($connect);
    return ($res);

}

function surl(){
  $url = $_GET['url'];

  $res = false;
  obtenir_inicialitzacions_bd($servidor, $usuari, $contrasenya, $bd);
  $connect = connectar_BD($servidor, $usuari, $contrasenya, $bd);

    if ($connect)
      {

        $instruccio = "SELECT * FROM url WHERE shorturl = '".$url."'";

        $consulta   = consulta_multiple($connect, $instruccio);
        $fila = obtenir_fila($consulta);
        
        while ($fila)
              {
                header("Location: ".$fila[1]."");
                $fila = obtenir_fila($consulta);
              }
          
        
        tancar_consulta_multiple($consulta);
      }


    desconnectar_bd($connect);
    return ($res);


}

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

?>