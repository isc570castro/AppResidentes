<?php
	session_start();
	$usuario=$_SESSION['login'];
	$seguridad = $_SESSION['seguridad'];
	if (!isset($seguridad)) {
	echo "<scrit type='text/javascript'> alert('Sin acceso'); </script>";
	header('Location: ../../index.html');
	}
	$idProyecto=$_REQUEST['idProyecto'];
 	$fecha=$_POST['fecha'];
 	$hora=$_POST['hora'];
	include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$sqlmaxSesion= mysql_query("select max(noSesion) from sesiones where idProyecto=$idProyecto", $link) or die(mysql_error());
$rows = mysql_fetch_array($sqlmaxSesion);
$noSesion=$rows['max(noSesion)']+1;
$sql = mysql_query("INSERT INTO sesiones
		VALUES ('$noSesion','$idProyecto','$fecha','$hora','','','Pendiente')", $link) or die(mysql_error());
if (!$sql){
	die("<p>Fallo la insersion a la base de datos: ".mysql_error()."</p>");
	mysql_close($link);
}else{
	echo 	"<script type='text/javascript'>
			alert('Datos guardados correctamente');
			</script>";
	/*echo 	'<a href="../../view/sesiones/historial.php?idProyecto=<?php echo $idProyecto;?>">';*/
	echo 	"<script type='text/javascript'>
			window.location='../../view/sesiones/historial.php?idProyecto=". $idProyecto ."'
			</script>";
	
	mysql_close($link);
}
?>