<?PHP

if(isset($_POST['btnCargar']))
{
	$nombre = $_POST['nombre'];
	$correo =$_POST['correo'];
	$edad = $_POST['edad'];
	$clave =$_POST['clave'];

	$archivo = fopen("datos/usuario.txt","a");
	$retorno = fwrite($archivo,$nombre."-".$correo."-".$edad."-".$clave."\r\n");
	fclose($archivo);

	header("location:Listado.php");

}
if(isset($_POST['btnIngresar']))
{
    header("location:VerificarUsuario.html");
}
?>