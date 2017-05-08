<?php

if(file_exists("datos/usuario.txt"))
{
    $lineasTotales;
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
    
$_SESSION['usuarios']=$lineasTotales;
  


function Imprimir()
{
    for($i=0; $i<count($_SESSION['usuarios']); $i++)
    {
        echo "<tr><td><h3>".$_SESSION['usuarios'][$i]."</h3></td>";
        echo '<td><form method="POST" action="borrar.php">
        <input type="submit" value="Eliminar" name="eliminar['.$i.']"></tr>';
        
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
      <table border:"8" id="tablaMost"> 
        <thead>
            <th colspan="8"><center>Listado PHP</center</th>
        </thead>
        <tbody>

        <?php
           Imprimir();
         ?>
           
        </tbody>
    </table>
</body>
</html>