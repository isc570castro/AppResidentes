<?php
session_start();
	$usuario=$_SESSION['login'];
	$seguridad = $_SESSION['seguridad'];
	if (!isset($seguridad)) {
	echo "<scrit type='text/javascript'> alert('Sin acceso'); </script>";
	header('Location: ../../index.html');
	}
	$idProyecto=$_REQUEST['idProyecto'];
	$noControl=$_GET['noControl'];
 	$calificacion=$_POST['calificacion'];
 	$criterio1=$_POST['requisitouno'];
 	$criterio2=$_POST['requisitodos'];
 	$criterio3=$_POST['requisitotres'];
 	$criterio4=$_POST['requisitocuatro'];
 	$criterio5=$_POST['requisitocinco'];
 	$criterio6=$_POST['requisitoseis'];
 	$observaciones=$_POST['observaciones'];
	include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
	$sql = mysql_query("SELECT * FROM calificaciones WHERE noControl='$noControl'", $link) or die(mysql_error());
	 if(mysql_num_rows($sql)<=0){
  		$asignar = mysql_query("INSERT INTO calificaciones VALUES ('$noControl','$criterio1','$criterio2','$criterio3','$criterio4','$criterio5','$criterio6','$calificacion','$observaciones')", $link) or die(mysql_error());
if (!$asignar){
	die("<p>Fallo la asignación de calificación: ".mysql_error()."</p>");
}else{
	echo 	"<script type='text/javascript'>
			alert(Su calificación se generó con exito);
			</script>";
	echo 	"<script type='text/javascript'>
			window.location='../../view/sesiones/concluir.php?idProyecto=$idProyecto';
			</script>";
}
  }else{
	$actualizar = mysql_query("UPDATE calificaciones SET criterio1='$criterio1',criterio2='$criterio2',criterio3='$criterio3',criterio4='$criterio4',criterio5='$criterio5',criterio6='$criterio6', total='$calificacion', observaciones='$observaciones' WHERE noControl='$noControl';", $link) or die(mysql_error());
if (!$actualizar){
	die("<p>Fallo la actualización de calificación: ".mysql_error()."</p>");
}else{
	echo 	"<script type='text/javascript'>
			alert(La calificación se actualizo con exito);
			</script>";
	echo 	"<script type='text/javascript'>
			window.location='../../view/sesiones/concluir.php?idProyecto=$idProyecto';
			</script>";
  }
}
mysql_close($link);

?>