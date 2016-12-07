<?php
	$usuario=$_POST['usuario'];
	$password=$_POST['password'];
	$confpassword=$_POST['confpassword'];
	$email=$_POST['email'];
	$pregunta=$_POST['pregunta'];
	$respuesta=$_POST['respuesta'];
	include ("../model/conexion.php");
	$objConex = new Conexion();
	$link=$objConex->conectarse();
	$sql = mysql_query("INSERT INTO usuario VALUES('".$usuario."','".$password."','".$email."','".$pregunta."','".$respuesta."');"
						,$link) or die(mysql_error());
	echo 	"<script type='text/javascript'>
			alert('Usuario registrado');
			</script>";
	echo 	"<script type='text/javascript'>
			window.location='../index.html'
			</script>";
	mysql_close($link);
?>