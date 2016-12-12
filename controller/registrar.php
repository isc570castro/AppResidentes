<?php
	$usuario=$_POST['usuario'];
	$password=$_REQUEST['password'];
	$confpassword=$_REQUEST['confpassword'];
	$email=$_REQUEST['email'];
	$pregunta=$_REQUEST['pregunta'];
	$respuesta=$_REQUEST['respuesta'];
	include ("../model/conexion.php");
	$objConex = new Conexion();
	$link=$objConex->conectarse();
	$sql = mysql_query("SELECT usuario FROM usuario WHERE usuario='$usuario';" , $link) or die(mysql_error());
	$row=mysql_num_rows($sql);
	if ($row == 0){
			$sql = mysql_query("INSERT INTO usuario VALUES('".$usuario."','".$password."','".$email."','".$pregunta."','".$respuesta."');"
			,$link) or die(mysql_error());
	echo 	"<script type='text/javascript'>
			alert('Usuario registrado');
			</script>";
	echo 	"<script type='text/javascript'>
			window.location='../index.html'
			</script>";

	}else{
		echo 	"<script type='text/javascript'>
				alert('El usuario ".$usuario." ya existe, por favor intenta con otro');
				</script>";
		echo 	"<script type='text/javascript'>
				window.location='../registrar.php?password=$password&confpassword=$confpassword&email=$email&pregunta=$pregunta&respuesta=$respuesta';
				</script>";
	}
	mysql_close($link);
?>