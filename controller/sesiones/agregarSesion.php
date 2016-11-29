<?php
	$idProyecto=$_REQUEST['idProyecto'];
 	$fecha=$_POST['fecha'];
 	$hora=$_POST['hora'];
	include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$sql = mysql_query("INSERT INTO sesiones
		VALUES (1,'$idProyecto','$fecha','$hora','','','Pendiente')", $link) or die(mysql_error());
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