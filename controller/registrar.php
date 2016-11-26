<?php
	$usuario=$_POST['usuario'];
	$password=$_POST['password'];
	$confpassword=$_POST['confpassword'];
	$email=$_POST['email'];
	include ("../model/conexion.php");
	$objConex = new Conexion();
	$link=$objConex->conectarse();
	$pass_encriptada1 = md5($password); //Encriptacion nivel 1
	$pass_encriptada2 = crc32($pass_encriptada1); //Encriptacion nivel 1
	$pass_encriptada3 = crypt($pass_encriptada2, "xtemp"); //Encriptacion nivel 2
	$pass_encriptada4 = sha1("xtemp" . $pass_encriptada3); //Encriptacion nivel 3
	$sql = mysql_query("INSERT INTO usuario VALUES('".$usuario."','".$pass_encriptada4."','".$email."');"
						,$link) or die(mysql_error());
	echo 	"<script type='text/javascript'>
			alert('Usuario registrado');
			</script>";
	echo 	"<script type='text/javascript'>
			window.location='../index.html'
			</script>";
	mysql_close($link);
?>