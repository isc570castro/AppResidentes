<?php
	session_start();
	$usuario=$_SESSION['login'];
	$seguridad = $_SESSION['seguridad'];
	if (!isset($seguridad)) {
	echo "<scrit type='text/javascript'> alert('Sin acceso'); </script>";
	header('Location: ../../index.html');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../src/materialize/css/materialize.min.css">
	<link rel="stylesheet" href="../../src/materialize/fonts/material-design-icons/material-icons.css">
	<script src="../../src/materialize/js/jquery.js"></script>
	<script src="../../src/materialize/js/materialize.min.js"></script>
	<title>Editar residente | SGR</title>
</head>
<body class="grey lighten-2">
	<div class="container">
		<div class="row">
			<br/>
			<div class="col m2 push-m1">
				<img src="../../src/img/mapache.png" alt="" class="responsive-img">
			</div>
			<div class="col m10">
				<br>
				<h4 class="center">Tecnológico Nacional de México</h4>
				<h5 class="center">Instituto Tecnológico de Zacatecas</h5>
			</div>
		</div>
	</div>
  	<nav class="z-depth-2 teal" role="navigation">
    	<div class="nav-wrapper container">
      		<a href="../inicio.php" class="brand-logo">Menu Principal</a>
      		<ul id="nav-mobile" class="right hide-on-med-and-down">
        		<li class="active"><a href="residentes.php"><i class="material-icons left">people</i>Residentes</a></li>
        		<li><a href="../proyectos/proyectos.php"><i class="material-icons left">business_center</i>Proyectos</a></li>
        		<li><a href="../relaciones/relaciones.php"><i class="material-icons left">repeat</i>Asignaciones</a></li>
        		<li><a href="../sesiones/sesiones.php"><i class="material-icons left">date_range</i>Sesiones</a></li>
        		<li><a href="../../controller/logout.php"><i class="material-icons right">directions_run</i>Cerrar sesión</a></li>
      		</ul>
    	</div>
  	</nav>
	<?php
		$noControl=$_POST['noControl'];
		include "../../model/conexion.php";
		$objConex = new Conexion();
		$link=$objConex->conectarse();
		$sql = mysql_query("SELECT * FROM residente WHERE noControl='$noControl';" , $link) or die(mysql_error());				
		$rows = mysql_fetch_array($sql);
		$nombre=$rows['nombre'];
		$apPaterno=$rows['apPaterno'];
		$apMaterno=$rows['apMaterno'];
		$calle=$rows['calle'];
		$numero=$rows['numero'];
		$colonia=$rows['colonia'];
		$cp=$rows['cp'];
		$telefono=$rows['telefono'];
		$semestre=$rows['semestre'];
		$carrera=$rows['carrera'];
		$correo=$rows['correo'];
	?>
  	<div class="container">
	 	<div class="row">
			<div class="col m12">
			    <div class="card-panel white z-depth-3">
			       	<H3 align="center">Editar residente</H3>
				  	<div class="row">
					    <form class="col s12" action="../../controller/residentes/actualizarResidente.php" method="POST" enctype="multipart/form-data" name="frmAgregar">
					    	<h4><i class="material-icons left" style="font-size: 40px;">account_circle</i>Datos personales</h4>
					    	<div class="divider"></div>
					      	<div class="row">
					      		<div class="col m2">
					      			<h5>Nombre completo</h5>
					      		</div>
						        <div class="input-field col m4">
						        	<input id="first_name" type="text" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+" length="15" maxlength="15" class="validate" name="nombre" value="<?php echo $nombre; ?>">
						         	<label for="first_name" data-error="Solo se aceptan letras">Nombre</label>
					        	</div>
					        	<div class="input-field col m3">
					          		<input id="last_name" type="text" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+" length="15" maxlength="15" class="validate" name="apPaterno" value="<?php echo $apPaterno; ?>">
					          		<label for="last_name" data-error="Solo se aceptan letras">Apellido paterno</label>
					        	</div>
					        	<div class="input-field col m3">
					          		<input id="last_name" type="text" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+" length="15" maxlength="15" class="validate" name="apMaterno" value="<?php echo $apMaterno; ?>">
					          		<label for="last_name" data-error="Solo se aceptan letras">Apellido materno</label>
					        	</div>
					      	</div>
					      	<div class="row">
					      		<div class="col m2">
					      			<h5>Dirección</h5>
					      		</div>
						        <div class="input-field col m4">
						        	<input id="first_name" type="text" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+" length="20" maxlength="20" class="validate" name="calle" value="<?php echo $calle; ?>">
						         	<label for="first_name" data-error="Hay caracteres inválidos en este campo">Calle</label>
					        	</div>
					        	<div class="input-field col m1">
					          		<input id="last_name" type="text" pattern="[0-9]+" length="4" maxlength="4" class="validate" name="numero" value="<?php echo $numero; ?>">
					          		<label for="last_name" data-error="Solo se aceptan numeros">Número</label>
					        	</div>
					        	<div class="input-field col m4">
					          		<input id="last_name" type="text" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+" length="15" maxlength="15" class="validate" name="colonia" value="<?php echo $colonia; ?>">
					          		<label for="last_name" data-error="Solo se aceptan letras">Colonia</label>
					        	</div>
					        	<div class="input-field col m1">
					          		<input id="last_name" type="text" pattern="[0-9]+" length="5" maxlength="5" class="validate" name="cp" value="<?php echo $cp; ?>">
					          		<label for="last_name" data-error="Solo se aceptan numeros">C.P.</label>
					        	</div>
					      	</div>
					      	<div class="row">
					      		<div class="col m2">
					      			<h5>Teléfono</h5>
					      		</div>
						        <div class="input-field col m10">
						        	<input id="first_name" type="text" pattern="[0-9]+" length="20" maxlength="20" class="validate" name="telefono" value="<?php echo $telefono; ?>">
						        	<label for="first_name" data-error="Solo se aceptan numeros"></label>
					        	</div>
					      	</div>
					      	<h4><i class="material-icons left" style="font-size: 40px;">school</i>Datos escolares</h4>
					    	<div class="divider"></div>
					      	<div class="row">
					      		<div class="col m2">
					      			<h5>Número de control</h5>
					      		</div>
						        <div class="input-field col m4">
						        	<input id="first_name" type="text" pattern="[0-9]+" length="8" maxlength="8" class="validate" name="noControl" value="<?php echo $noControl; ?>" required>
						        	<label for="a" data-error="Solo se aceptan numeros"></label>
					        	</div>
					        	<div class="col m2">
					      			<h5>Semestre</h5>
					      		</div>
						         <div class="input-field col m4">
						        	<select name="semestre">
      									<option value="<?php echo $semestre; ?>" selected><?php echo $semestre; ?></option>
      									<option value="Noveno">Noveno</option>
      									<option value="Decimo">Decimo</option>
      									<option value="Onceavo">Onceavo</option>
    								</select>
					        	</div>
					      	</div>
					      	<div class="row">
					      		<div class="col m2">
					      			<h5>Carrera</h5>
					      		</div>
						        <div class="input-field col m10">
						        	<select id="a" name="carrera" required>
      									<option value="<?php echo $rows['carrera']; ?>" selected><?php echo $rows['carrera']; ?></option>
      									<option value="Ingeniería en Sistemas Computacionales">Ingeniería en Sistemas Computacionales</option>
      									<option value="Ingeniería en Informática">Ingeniería en Informática</option>
      									<option value="Ingeniería en Gestion Empresarial">Ingeniería en Gestion Empresarial</option>
      									<option value="Ingeniería en Electromecánica">Ingeniería en Electromecánica</option>
      									<option value="Arquitectura">Arquitectura</option>
      									<option value="Licenciatura en Administración de Empresas">Licenciatura en Administración de Empresas</option>
      									<option value="Ingeniería en Materiales">Ingeniería en Materiales</option>
    								</select>
					        	</div>
					      	</div>
					      	<h4><i class="material-icons left" style="font-size: 40px;">mail</i>Cuenta</h4>
					    	<div class="divider"></div>
					      	<div class="row">
					      		<div class="col m2">
					      			<h5>Correo electrónico</h5>
					      		</div>
						        <div class="input-field col m10">
						        	<input id="first_name" type="email" length="30" maxlength="30"  class="validate" name="correo" value="<?php echo $correo; ?>">
						        	<label for="a" data-error="Solo se acepta este formato: ejemplo@email.com"></label>
					        	</div>
					      	</div>
  							<a class="waves-effect waves-light btn red right" href="residentes.php">Cancelar</a>
					      	<button class="btn waves-effect waves-light blue right" type="submit" name="action">Aceptar
  							</button>
					    </form>
				 	 </div>
			    </div>
			</div>
		</div>
  	</div>
</body>
<script type="text/javascript">
	$(document).ready(function() {
    	$('select').material_select();
  	});
</script>
</html>