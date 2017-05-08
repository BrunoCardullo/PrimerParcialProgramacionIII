<?php

$correo =$_POST['correo'];
$clave =$_POST['clave'];


if(file_exists("datos/usuario.txt"))
{
    $archivo = fopen("datos/usuario.txt","r");
    $i=0;
    while(!feof($archivo))
    { 
        $lineaLeida= fgets($archivo);
        $substr= trim($lineaLeida);
        if($substr)
        {
            $lineasTotales[$i] = $substr;
            $i++;        
        }       
    }    
    fclose($archivo);
}
else
{
   echo "ERROR";
}   


$_SESSION['usuarios']= $lineasTotales;

$flag = false;
 for($i=0; $i<count($lineasTotales); $i++)
    {
       $us = explode("-",$lineasTotales[$i]);
       if($us[1]== $correo && $us[3]== $clave)
       {
          $flag = true;
          header("location:Listado.php");
       }
    }
    if(!$flag)
    echo "ERROR, " . $correo . "no existe, o ingreso mal la contraseña.";
   
?>