<?php
session_start();
	$usuario=$_SESSION['login'];
	$seguridad = $_SESSION['seguridad'];
	if (!isset($seguridad)) {
	echo "<scrit type='text/javascript'> alert('Sin acceso'); </script>";
	header('Location: ../../index.html');
	}
$nombreProyecto=$_POST['nombreProyecto'];
include "../../model/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
$sql = mysql_query("SELECT * FROM proyecto WHERE nombreProyecto LIKE '%$nombreProyecto%';" , $link) or die(mysql_error());
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../src/materialize/css/materialize.min.css">
	<link rel="stylesheet" href="../../src/materialize/fonts/material-design-icons/material-icons.css">
	<script src="../../src/materialize/js/jquery.js"></script>
	<script src="../../src/materialize/js/materialize.min.js"></script>
	<title>Proyectos | SGR</title>
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
        		<li><a href="../../view/residentes/residentes.php"><i class="material-icons left">people</i>Residentes</a></li>
        		<li class="active"><a href="../../view/proyectos/proyectos.php"><i class="material-icons left">business_center</i>Proyectos</a></li>
        		<li><a href="../../view/relaciones/relaciones.php"><i class="material-icons left">repeat</i>Asignaciones</a></li>
        		<li><a href="../../view/sesiones/sesiones.php"><i class="material-icons left">date_range</i>Sesiones</a></li>
        		<li><a href="../../controller/logout.php"><i class="material-icons right">directions_run</i>Cerrar sesión</a></li>
      		</ul>
    	</div>
  	</nav>
  	<div class="container">
	 	<div class="row">
			<div class="col m12">
			    <div class="card-panel white z-depth-3">
			       	<H3 align="center">Proyectos</H3>
			       	<div class="row">
			       		<div class="col m12">
			       			<form action="consultarProyecto.php" method="POST" enctype="multipart/form-data" name="frmConsultar">
        						<div class="input-field">
          							<input id="search" type="search" required name="nombreProyecto" value="<?php echo $nombreProyecto; ?>">
          							<label for="search"><i class="material-icons">search</i></label>
          							<i class="material-icons">close</i>
        						</div>
      						</form>
      					</div>
						<div class="col m6 center">
				    		<a href="../../view/proyectos/agregar.html" class="waves-effect waves-light btn-large green accent-3 z-depth-3"><i class="material-icons left">add</i>Agregar</a>
						</div>
						<div class="col m6 center">
				    		<a href="../../view/proyectos/proyectos.php" class="waves-effect waves-light btn-large yellow darken-1 z-depth-3"><i class="material-icons left">keyboard_arrow_left</i>Regresar</a>
						</div>
					</div>
					<div class="row">
						<div class="col m12">
							<table class="centered striped bordered z-depth-3">
						        <thead>
						          	<tr>
						              	<th>Nombre del proyecto</th>
						              	<th>Asesor externo</th>
						              	<th>Asesor interno</th>
						              	<th>Nombre de la empresa</th>
						              	<th>Dueño de la empresa</th>
						              	<th>Dirección de la empresa</th>
						              	<th>Teléfono de la empresa</th>
						              	<th>Estado</th>
						          	</tr>
						        </thead>
						        <tbody>
						          	<tr>
								<?php
								while ($rows = mysql_fetch_array($sql)){   
								?>
									<td><?php echo $rows ['nombreProyecto']; ?></td>
									<td><?php echo $rows ['asesorExterno']; ?></td>
									<td><?php echo $rows ['asesorInterno']; ?></td>
									<td><?php echo $rows ['nombreEmpresa']; ?></td>
									<td><?php echo $rows ['duenoEmpresa']; ?></td>
									<td><?php echo $rows ['direccionEmpresa']; ?></td>
									<td><?php echo $rows ['telefonoEmpresa']; ?></td>
									<td><?php echo $rows ['estado']; ?></td>
						          	<td><a href="../../view/proyectos/editar.php?idProyecto=<?php echo $rows['idProyecto'];?>" class="btn tooltipped blue" data-position="bottom" data-delay="50" data-tooltip="Editar proyecto"><i class="material-icons">edit</i></a>
										<br/><br/><a onclick="" href="borrarProyecto.php?idProyecto=<?php echo $rows['idProyecto'];?>" class="btn tooltipped red" data-position="bottom" data-delay="50" data-tooltip="Eliminar proyecto"><i class="material-icons">cancel</i></a></td>
						          	</tr>
									    <?php 
											}
									    ?>
						        </tbody>
			      			</table>
						</div>
					</div>
			    </div>
			</div>
		</div>
  	</div>
</body>
</html>