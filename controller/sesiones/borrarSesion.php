<?php
	session_start();
	$usuario=$_SESSION['login'];
	$seguridad = $_SESSION['seguridad'];
	if (!isset($seguridad)) {
	echo "<scrit type='text/javascript'> alert('Sin acceso'); </script>";
	header('Location: ../../index.html');
	}
	$noSesion=$_REQUEST['noSesion'];
	$idProyecto=$_REQUEST['idProyecto'];
	include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$sql = mysql_query("DELETE FROM sesiones WHERE noSesion='$noSesion' and idProyecto='$idProyecto'", $link) or die(mysql_error());
if (!$sql){
	die("<p>Fallo la baja de sesion ".mysql_error()."</p>");
	mysql_close($link);
}else{
	echo 	"<script type='text/javascript'>
			alert('Datos eliminados correctamente');
			</script>";
	}
	echo 	"<script type='text/javascript'>
			window.location='../../view/sesiones/historial.php?idProyecto=". $idProyecto ."'
			</script>";
    mysql_close($link);

?>