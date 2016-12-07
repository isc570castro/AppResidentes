<?php
	<?php
	session_start();
	$usuario=$_SESSION['login'];
	$seguridad = $_SESSION['seguridad'];
	if (!isset($seguridad)) {
	echo "<scrit type='text/javascript'> alert('Sin acceso'); </script>";
	header('Location: ../../index.html');
	}
?>
	$noControl=$_POST['noControl'];
	include "../../model/conexion.php";
	$objConex = new Conexion();
	$link=$objConex->conectarse();
	$sql = mysql_query("SELECT * FROM proyecto,asignaciones,residente where proyecto.idProyecto=asignaciones.idProyecto and residente.noControl=asignaciones.noControl and residente.noControl like '%$noControl%'", $link) or die(mysql_error());	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../src/materialize/css/materialize.min.css">
	<link rel="stylesheet" href="../../src/materialize/fonts/material-design-icons/material-icons.css">
	<script src="../../src/materialize/js/jquery.js"></script>
	<script src="../../src/materialize/js/materialize.min.js"></script>
	<title>Búsqueda | SGR</title>
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
      		<a href="../inicio.html" class="brand-logo">Menu Principal</a>
      		<ul id="nav-mobile" class="right hide-on-med-and-down">
        		<li><a href="../residentes/residentes.php"><i class="material-icons left">people</i>Residentes</a></li>
        		<li><a href="../proyectos/proyectos.php"><i class="material-icons left">business_center</i>Proyectos</a></li>
        		<li class="active"><a href="relaciones.php"><i class="material-icons left">repeat</i>Asignaciones</a></li>
        		<li><a href="../sesiones/sesiones.php"><i class="material-icons left">date_range</i>Sesiones</a></li>
        		<li><a href="#"><i class="material-icons right">directions_run</i>Cerrar sesión</a></li>
      		</ul>
    	</div>
  	</nav>
  	<div class="container">
	 	<div class="row">
			<div class="col m12">
			    <div class="card-panel white z-depth-3">
			       	<H3 align="center">Relaciones</H3>
			       	<div class="row">
			       		<div class="col m12">
			       			<form action="buscarRelaciones.php" method="POST" enctype="multipart/form-data" name="frmBuscar">
        						<div class="input-field">
          							<input id="search" type="search" required name="noControl" value="<?php echo $noControl?>">
          							<label for="search" style="font-size: 18px;"><i class="material-icons">search</i> Buscar asignaciones por No. de Ctrl.</label>
          							<i class="material-icons">close</i>

        						</div>
      						</form>
      					</div>
					</div>
					<div class="row">
						<div class="col m12">
							<table class="centered striped bordered z-depth-3">
						        <thead>
						          	<tr>
						              	<th>Proyecto</th>
						              	<th></th>
						          	</tr>
						        </thead>
						        <tbody>					 
								<?php while ($rows = mysql_fetch_array($sql)){ ?>
						          	<tr>
						          		<td><?php echo $rows['nombreResidente'];?></td>
						          		<td><?php echo $rows['nombreProyecto'];?></td>
						            	<td><a class="btn tooltipped red" href="../../controller/relaciones/eliminarAsignacion.php?noControl=<?php echo $rows['noControl'];?>" data-position="bottom" data-delay="50" data-tooltip="Eliminar"><i class="material-icons">cancel</i></a></td>
						          	</tr>
						         <?php } ?> 
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