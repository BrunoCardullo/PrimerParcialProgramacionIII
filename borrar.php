<?php
require_once("VerificarUsuario.php");

$submit = isset($_POST["eliminar"]);

if($submit)
{
    $indice = key($_POST["eliminar"]);

    array_splice($_SESSION['usuarios'],$indice,1); 
    $cantidadUsuarios = count($_SESSION['usuarios']);

    unlink('datos/usuario.txt');

    if($cantidadUsuarios == 0)
    {  
    echo "ERROR";
    }
    else
    {
        $archivo = fopen("datos/usuario.txt","a");
        $retorno = true;
        for($i=0; $i<$cantidadUsuarios; $i++)
        { 
            if($retorno)
            $retorno = fwrite($archivo,$_SESSION['usuarios'][$i]."\r\n");
        }
        fclose($archivo);
        
        header("location:Listado.php");
    }
}

?>