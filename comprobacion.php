<?php
$username=$_REQUEST['username'];
$pregunta=$_POST['pregunta'];
$respuesta=$_POST['respuesta'];
include "model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$sql = mysql_query("SELECT password FROM usuario WHERE usuario='$username' and pregunta='$pregunta' and respuesta='$respuesta';" , $link) or die(mysql_error());
$rows = mysql_fetch_array($sql);
$password=$rows['password'];
$row=mysql_num_rows($sql);
	if ($row == 0){
			 echo "<script> 
            alert('Respuesta incorrecta'); 
            setTimeout('self.close();',100)
            </script>";
  			echo "<script> 
            window.location='recuperar2.php?username=$username';
          	</script>";

	}else{
		echo 	"<script type='text/javascript'>
				alert('Hola ".$username.", su contraseña es:   " .$password. "');
				</script>";
		echo 	"<script type='text/javascript'>
				window.location='index.html'
				</script>";
	}
	mysql_close($link);
?>