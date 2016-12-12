<?php
	session_start();
	$usuario=$_SESSION['login'];
	$seguridad = $_SESSION['seguridad'];
	if (!isset($seguridad)) {
	echo "<scrit type='text/javascript'> alert('Sin acceso'); </script>";
	header('Location: ../../index.html');
	}
	$idProyecto=$_REQUEST['idProyecto'];	
	include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$sql = mysql_query("UPDATE proyecto SET
		estado='Concluido' WHERE idProyecto='$idProyecto';", $link) or die(mysql_error());
$sql2 = mysql_query("DELETE FROM sesiones
		 WHERE idProyecto='$idProyecto' AND estado='pendiente';", $link) or die(mysql_error());
if (!$sql){
	die("<p>Fallo la actualización de datos: ".mysql_error()."</p>");
}else{
	echo 	"<script type='text/javascript'>
			alert('El proyecto se ha concluido');
			</script>";
	echo 	"<script type='text/javascript'>
			window.location='../../view/sesiones/sesiones.php'
			</script>";
}
mysql_close($link);
?>