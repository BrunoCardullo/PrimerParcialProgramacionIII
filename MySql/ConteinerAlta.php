<?PHP
 $descripcion = $_POST['descripcion'];
 $pais = $_POST['pais'];
 $foto = $_POST['foto'];

        try{
             $conexion = new PDO('mysql:host=localhost; dbname=basededatos', 'root' , '');
             $sql = "INSERT INTO conteiner(descripcion, pais, foto) VALUES ('".$descripcion."','".$pais."','".$foto."')";
             $consulta = $conexion->prepare($sql);
             $consulta->execute();

        }catch(Exception $e){
            die('Error'.$e->GetMessage());
        }finally{
            $conexion = null;
        }
?>