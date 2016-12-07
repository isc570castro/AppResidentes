<?php
session_start();
$usuario = $_SESSION['login'];
$seguridad = $_SESSION['seguridad'];
if (!isset($seguridad)) {
	echo "<SCRIPT TYPE='text/javascript'> alert('Sin acceso'); </SCRIPT>";
	header('Location: index.php');
}
echo 	"<script type='text/javascript'>
		alert('Hasta luego ".$usuario."');
		</script>";
session_destroy();
echo 	"<script type='text/javascript'>
		window.location='../index.html'
		</script>";		
?>