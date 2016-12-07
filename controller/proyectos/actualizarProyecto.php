<?php
	session_start();
	$usuario=$_SESSION['login'];
	$seguridad = $_SESSION['seguridad'];
	if (!isset($seguridad)) {
	echo "<scrit type='text/javascript'> alert('Sin acceso'); </script>";
	header('Location: ../../index.html');
	}
	$idProyecto=$_GET['idProyecto'];	
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
	$estado=$_POST['estado'];
	$anoinicio=$_POST['yearInicio'];
	$anofin=$_POST['yearFin'];
	$mesinicio=$_POST['mesInicio'];
	$mesfin=$_POST['mesFin'];
	include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$sql = mysql_query("UPDATE proyecto SET
		nombreProyecto='$nombreProyecto', asesorExterno='$asesorExterno',asesorInterno='$asesorInterno',nombreEmpresa='$nombreEmpresa',duenoEmpresa='$duenoEmpresa',direccionEmpresa='Calle ".$calle." #".$numero." Col. ".$colonia." C.P. ".$cp."',calle='$calle',numero='$numero',colonia='$colonia',cp='$cp',telefonoEmpresa='$telefono',estado='$estado',periodo='".$mesinicio." ".$anoinicio." - ".$mesfin." ".$anofin."', mesInicio='$mesinicio',mesFin='$mesfin',yearInicio='$anoinicio',yearFin='$anofin' WHERE idProyecto='$idProyecto';", $link) or die(mysql_error());
if (!$sql){
	die("<p>Fallo la actualización de datos: ".mysql_error()."</p>");
}else{
	echo 	"<script type='text/javascript'>
			alert('Datos actualizados correctamente');
			</script>";
	echo 	"<script type='text/javascript'>
			window.location='../../view/proyectos/proyectos.php'
			</script>";
}
mysql_close($link);
?>