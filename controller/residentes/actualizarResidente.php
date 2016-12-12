<?php
	session_start();
	$usuario=$_SESSION['login'];
	$seguridad = $_SESSION['seguridad'];
	if (!isset($seguridad)) {
	echo "<scrit type='text/javascript'> alert('Sin acceso'); </script>";
	header('Location: ../../index.html');
	}
	$nombre=$_POST['nombre'];
 	$apPaterno=$_POST['apPaterno'];
 	$apMaterno=$_POST['apMaterno'];
	$calle=$_POST['calle'];
	$numero=$_POST['numero'];
	$colonia=$_POST['colonia'];
	$cp=$_POST['cp'];
	$telefono=$_POST['telefono'];
	$noControl=$_POST['noControl'];
	$semestre=$_POST['semestre'];
	$carrera=$_POST['carrera'];
	$correo=$_POST['correo'];
	include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$sql = mysql_query("UPDATE residente set nombreResidente='".$nombre." ".$apPaterno." ".$apMaterno."', nombre='$nombre',apPaterno='$apPaterno', apMaterno='$apMaterno', direccion='Calle ".$calle." #".$numero." Col. ".$colonia." C.P. ".$cp."', calle='$calle', numero='$numero', colonia='$colonia',cp='$cp',telefono='$telefono',noControl='$noControl',semestre='$semestre',carrera='$carrera',correo='$correo' WHERE noControl='$noControl';", $link) or die(mysql_error());
if (!$sql){
	die("<p>Fallo la actualización de datos: ".mysql_error()."</p>");
}else{
	echo 	"<script type='text/javascript'>
			alert('Datos actualizados correctamente');
			</script>";
	echo 	"<script type='text/javascript'>
			window.location='../../view/residentes/residentes.php'
			</script>";
}
mysql_close($link);
?>