<?php 
	session_start();
	$usuario=$_SESSION['login'];
	$seguridad = $_SESSION['seguridad'];
	if (!isset($seguridad)) {
	echo "<scrit type='text/javascript'> alert('Sin acceso'); </script>";
	header('Location: ../../index.html');
	}
	$idProyecto=$_REQUEST['idProyecto'];
 	$noSesion=$_REQUEST['noSesion'];
 	$observaciones=$_POST['observaciones'];
	$avances=$_POST['avances'];
	$estado=$_POST['estado'];
	include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
if ($estado=="Cancelado"){
	$sql = mysql_query("DELETE FROM sesiones WHERE noSesion='$noSesion' and idProyecto='$idProyecto'", $link) or die(mysql_error());
}else{
$sql = mysql_query("UPDATE sesiones set observaciones='$observaciones', avances='$avances', estado='$estado' WHERE idProyecto='$idProyecto' and noSesion='$noSesion'", $link) or die(mysql_error());
if (!$sql){
	die("<p>Fallo la actualización de datos: ".mysql_error()."</p>");

echo 	"<script type='text/javascript'>
			alert('Datos actualizados correctamente');
			</script>";
}
}
echo 	"<script type='text/javascript'>
		window.location='../../view/sesiones/historial.php?idProyecto=$idProyecto';
		</script>";

		?>