<?php
	$noControl=$_GET['noControl'];
	include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$sql = mysql_query("DELETE FROM asignaciones WHERE noControl='$noControl'", $link) or die(mysql_error());
if (!$sql){
	die("<p>Fallo la baja de residente ".mysql_error()."</p>");
	mysql_close($link);
}else{
	echo 	"<script type='text/javascript'>
			alert('Datos dados de baja correctamente');
			</script>";
	echo 	"<script type='text/javascript'>
			window.location='../../view/relaciones/relaciones.php'
			</script>";
    mysql_close($link);
}
?>