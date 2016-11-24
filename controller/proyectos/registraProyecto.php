<?php
	$nombreProyecto=$_POST['nombreProyecto'];
 	$asesorExterno=$_POST['asesorExterno'];
 	$asesorInterno=$_POST['asesorInterno'];
	$nombreEmpresa=$_POST['nombreEmpresa'];
	$duenoEmpresa=$_POST['duenoEmpresa'];
	$calle=$_POST['calle'];
	$numero=$_POST['numero'];
	$colonia=$_POST['colonia'];
	$cp=$_POST['cp'];
	$telefono=$_POST['telefono'];
	include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$sql = mysql_query("INSERT INTO proyecto
		VALUES (null,'$nombreProyecto','$asesorExterno','$asesorInterno','$nombreEmpresa','$duenoEmpresa','Calle ".$calle." #".$numero." Col. ".$colonia." C.P. ".$cp."','$calle','$numero','$colonia','$cp','$telefono','Proceso')", $link) or die(mysql_error());
if (!$sql){
	die("<p>Fallo la insersion a la base de datos: ".mysql_error()."</p>");
	mysql_close($link);
}else{
	echo 	"<script type='text/javascript'>
			alert('Datos guardados correctamente');
			</script>";
	echo 	"<script type='text/javascript'>
			window.location='../../view/proyectos/proyectos.php'
			</script>";
	mysql_close($link);
}
?>