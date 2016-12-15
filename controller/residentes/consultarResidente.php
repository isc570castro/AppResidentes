<?php
session_start();
	$usuario=$_SESSION['login'];
	$seguridad = $_SESSION['seguridad'];
	if (!isset($seguridad)) {
	echo "<scrit type='text/javascript'> alert('Sin acceso'); </script>";
	header('Location: ../../index.html');
	}
$noControl=$_POST['noControl'];
include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$sql = mysql_query("SELECT * FROM residente WHERE noControl like '%$noControl%';" , $link) or die(mysql_error());
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../src/materialize/css/materialize.min.css">
	<link rel="stylesheet" href="../../src/materialize/fonts/material-design-icons/material-icons.css">
	<script src="../../src/materialize/js/jquery.js"></script>
	<script src="../../src/materialize/js/materialize.min.js"></script>
	<title>Residentes | SGR</title>
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
      		<a href="../../view/inicio.php" class="brand-logo">Menu Principal</a>
      		<ul id="nav-mobile" class="right hide-on-med-and-down">
        		<li class="active"><a href="../../view/residentes/residentes.php"><i class="material-icons left">people</i>Residentes</a></li>
        		<li><a href="../../view/proyectos/proyectos.php"><i class="material-icons left">business_center</i>Proyectos</a></li>
        		<li><a href="../../view/relaciones/relaciones.php"><i class="material-icons left">repeat</i>Asignaciones</a></li>
        		<li><a href="../../view/sesiones/sesiones.php"><i class="material-icons left">date_range</i>Sesiones</a></li>
        		<li><a href=../../controller/logout.php"><i class="material-icons right">directions_run</i>Cerrar sesión</a></li>
      		</ul>
    	</div>
  	</nav>
  	<div class="container">
	 	<div class="row">
			<div class="col m12">
			    <div class="card-panel white z-depth-3">
			       	<H3 align="center">Residentes</H3>
			       	<div class="row">
			       		<div class="col m12">
			       			<form action="consultarResidente.php" method="POST" enctype="multipart/form-data" name="frmBuscar">
        						<div class="input-field">
          							<input id="search" type="search" required name="noControl" value="<?php echo $noControl; ?>">
          							<label for="search" style="font-size: 18px;"><i class="material-icons">search</i> Buscar por numero de control</label>
        						</div>
      						</form>
      					</div>
						<div class="col m3 center">
				    		<a href="../../view/residentes/agregar.html" class="waves-effect waves-light btn-large green accent-3 z-depth-3"><i class="material-icons left">add</i>Agregar</a>
						</div>
						<div class="col m3 center">
				    		<a href="../../view/residentes/eliminar.html" class="waves-effect waves-light btn-large red z-depth-3"><i class="material-icons left">cancel</i>Eliminar</a>
						</div>
						<div class="col m3 center">
				    		<a href="../../view/residentes/modificar.html" class="waves-effect waves-light btn-large blue z-depth-3"><i class="material-icons left">cached</i>Modificar</a>
						</div>
						<div class="col m3 center">
				    		<a href="../../view/residentes/residentes.php" class="waves-effect waves-light btn-large yellow darken-1 z-depth-3"><i class="material-icons left">keyboard_arrow_left</i>Regresar</a>
						</div>
					</div>
<?php

echo ' 
					<div class="row">
						<div class="col m12">
							<table class="centered striped bordered z-depth-3">
						        <thead>
						          	<tr>
						              	<th>No. Ctrl</th>
						              	<th>Nombre</th>
						              	<th>Direccion</th>
						              	<th>Telefono</th>
						              	<th>Semestre</th>
						              	<th>Carrera</th>
						              	<th>E-mail</th>
						          	</tr>
						        </thead>
						        <tbody>
								<tr align="center">';
								while ($rows = mysql_fetch_array($sql)){
								echo '
									<td> '.$rows['noControl'] .'</td>
									<td> '.$rows['nombreResidente'] .'</td>
									<td> '.$rows['direccion'] .'</td>
									<td> '.$rows['telefono'] .'</td>
									<td> '.$rows['semestre'] .'</td>
     								<td> '.$rows['carrera'] .'</td>
     								<td> '.$rows['correo'] .' </td>
     							</tr>
								';
								}
								echo '
								<tbody>
			      				</table>';
?>
						</div>
					</div>
			    </div>
			</div>
		</div>
  	</div>
</body>
</html>