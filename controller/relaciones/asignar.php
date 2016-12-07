<?php
	session_start();
	$usuario=$_SESSION['login'];
	$seguridad = $_SESSION['seguridad'];
	if (!isset($seguridad)) {
	echo "<scrit type='text/javascript'> alert('Sin acceso'); </script>";
	header('Location: ../../index.html');
	}
	$idProyecto=$_REQUEST['idProyecto'];
 	$noControl=$_POST['noControl'];
	include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$sql = mysql_query("INSERT INTO asignaciones
		VALUES ($noControl,$idProyecto)", $link);
if (!$sql){
	echo 	"<script type='text/javascript'>
			alert('El numero de control ".$noControl." no está dado de alta');
			alert('No se guardo el registro');
			window.location='../../view/relaciones/asignarResidentes.php?idProyecto=$idProyecto'
			</script>";
	mysql_close($link);
}else{
	echo 	"<script type='text/javascript'>
			alert('Datos guardados correctamente');
			</script>";
	/*echo 	'<a href="../../view/sesiones/historial.php?idProyecto=<?php echo $idProyecto;?>">';*/
	echo 	"<script type='text/javascript'>
			window.location='../../view/relaciones/asignarResidentes.php?idProyecto=$idProyecto'
			</script>";
	
	mysql_close($link);
}
?>