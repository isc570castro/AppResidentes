<?php
if (($_POST["usuario"] == '') or ( $_POST["password"] == '')) {
        echo '<script language="JavaScript" type="text/javascript">;
                alert("Necesitas introducir datos de login");
                </script>';
        echo 	"<script type='text/javascript'>
				window.location='../index.html'
				</script>";
}else{
	$user=$_POST['usuario'];
	$password=$_POST['password'];
	include "../model/conexion.php";
	$objConex = new Conexion();
	$link=$objConex->conectarse();
	session_start();

	$pass_encriptada1 = md5($password); //Encriptacion nivel 1
	$pass_encriptada2 = crc32($pass_encriptada1); //Encriptacion nivel 1
	$pass_encriptada3 = crypt($pass_encriptada2, "xtemp"); //Encriptacion nivel 2
	$pass_encriptada4 = sha1("xtemp" . $pass_encriptada3); //Encriptacion nivel 3
	$sql = mysql_query("SELECT usuario, password FROM usuario WHERE usuario='" .$user. "'
					   AND password='$pass_encriptada4';" , $link) or die(mysql_error());
	$row=mysql_num_rows($sql);
	if ($row == 0){
			echo 	"<script type='text/javascript'>
					alert('Acceso incorrecto');
					</script>";
			echo 	"<script type='text/javascript'>
					window.location='../index.html'
					</script>";
	}else{
		while ($rows = mysql_fetch_array($sql)){
			$_SESSION['login'] = $rows['usuario'];
			$_SESSION['contra'] = $rows['password'];
			$_SESSION['seguridad'] = "ok";
		}
		echo 	"<script type='text/javascript'>
				alert('Bienvenido " .$_SESSION['login']. "');
				</script>";
		echo 	"<script type='text/javascript'>
				window.location='../view/inicio.html'
				</script>";
	}
	mysql_close($link);
}

?>