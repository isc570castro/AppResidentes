<?php
	session_start();
	$usuario=$_SESSION['login'];
	$seguridad = $_SESSION['seguridad'];
	if (!isset($seguridad)) {
	echo "<scrit type='text/javascript'> alert('Sin acceso'); </script>";
	header('Location: ../../index.html');
	}
	$idProyecto=$_GET['idProyecto'];
	include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$sql = mysql_query("DELETE FROM proyecto WHERE idProyecto='$idProyecto'", $link) or die(mysql_error());
if (!$sql){
	die("<p>Fallo la baja de residente ".mysql_error()."</p>");
	mysql_close($link);
}else{
	echo 	"<script type='text/javascript'>
			alert('Datos de proyecto dados de baja correctamente');
			</script>";
	echo 	"<script type='text/javascript'>
			window.location='../../view/proyectos/proyectos.php'
			</script>";
    mysql_close($link);
}
?>