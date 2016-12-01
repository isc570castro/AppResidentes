<?php
	$noControl=$_GET['noControl'];
 	$idProyecto=$_REQUEST['idProyecto'];
 	$calificacion=$_POST['calificacion'];
	include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$sql = mysql_query("UPDATE residente set calificacion='$calificacion' WHERE noControl='$noControl';", $link) or die(mysql_error());
if (!$sql){
	die("<p>Fallo la actualización de datos: ".mysql_error()."</p>");
}else{
	echo 	"<script type='text/javascript'>
			alert(Su calificación se generó con exito);
			</script>";
	echo 	"<script type='text/javascript'>
			window.location='../../view/sesiones/concluir.php?idProyecto=$idProyecto';
			</script>";
}
mysql_close($link);
?>