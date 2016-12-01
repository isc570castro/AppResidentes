<?php
	$idProyecto=$_REQUEST['idProyecto'];
	include "../../model/conexion.php";
	$objConex = new Conexion();
	$link=$objConex->conectarse();
	$sql = mysql_query("SELECT   noSesion, fecha, hora, avances, observaciones, estado FROM  sesiones  where  idProyecto=$idProyecto ", $link) or die(mysql_error());
	$sql2 = mysql_query("SELECT   nombreProyecto FROM  proyecto where  idProyecto=$idProyecto ", $link) or die(mysql_error());	
	$rows2 = mysql_fetch_array($sql2);
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../src/materialize/css/materialize.min.css">
	<link rel="stylesheet" href="../../src/materialize/fonts/material-design-icons/material-icons.css">
	<script src="../../src/materialize/js/jquery.js"></script>
	<script src="../../src/materialize/js/materialize.min.js"></script>
	<title>Historial | SGR</title>
	<script type='text/javascript'>
	function confirm() {
	var confirm=confirm('¿Esta seguro que desea eliminar una sesion?');
	if (confirm){
		return true;
	}else{
		return false;
	}
	}
	</script>
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
        		<li><a href="../relaciones/relaciones.php"><i class="material-icons left">repeat</i>Asignaciones</a></li>
        		<li class="active"><a href="sesiones.php"><i class="material-icons left">date_range</i>Sesiones</a></li>
        		<li><a href="#"><i class="material-icons right">directions_run</i>Cerrar sesión</a></li>
      		</ul>
    	</div>
  	</nav>
  	<div class="container">
	 	<div class="row">
			<div class="col m12">
			    <div class="card-panel white z-depth-3">
			       	<H3 align="center">Historial de sesiones de <br><?php echo $rows2['nombreProyecto']?></H3>
					<div class="row">
						<div class="col m12">
			       			<form>
        						<div class="input-field">
          							<input id="search" type="search" required>
          							<label for="search"  style="font-size: 20px;"><i class="material-icons">search</i>Buscar por sesión</label>
          							<i class="material-icons">close</i>
        						</div>
      						</form>
      					</div>
      						<div class="row">
						<div class="col m4 center">
				    			<a class=" btn-large green accent-3 " href="nuevaSesion.php?idProyecto=<?php echo $idProyecto;?>"><i class="material-icons left">add</i>Nueva sesión</a>
						</div>
						<div class="col m4 center">
				    		<a target="_bank" class="waves-effect waves-light btn-large blue z-depth-3" href="reportes/reporteSesiones.php?idProyecto=<?php echo $idProyecto; ?>"><i class="material-icons left">description</i>Reporte</a>
						</div>
						<div class="col m4 center">
				    		<a href="concluir.php?idProyecto=<?php echo $idProyecto;?>" class="waves-effect waves-light btn-large yellow darken-2 z-depth-3"><i class="material-icons left">done</i>Concluir</a>
						</div>
					    </div>
						<div class="col m12">
							<table class="centered striped bordered z-depth-3">
						        <thead>
						          	<tr>
						          		<th>No. sesión</th>
						              	<th>Fecha de sesión</th>
						              	<th>Hora de sesión</th>
						              	<th>Avances</th>
						              	<th>Observación</th>
						              	<th>Estado</th>
						              	<th></th>
						          	</tr>
						        </thead>
						        <tbody>
						        <?php 
						        	while($rows = mysql_fetch_array($sql)){   
								?>
								<tr>
									<td><?php echo $rows ['noSesion']; ?></td>
									<td><?php echo $rows ['fecha']; ?></td>
									<td><?php echo $rows ['hora']; ?></td>
									<td><?php echo $rows ['observaciones']; ?></td>
									<td><?php echo $rows ['avances']; ?></td>
									<td><?php echo $rows ['estado']; ?></td>
						          	<td><a href="anotaciones.php?idProyecto=<?php echo $idProyecto; ?>&noSesion=<?php echo $rows['noSesion']?>" class="btn tooltipped blue" data-position="bottom" data-delay="50" data-tooltip="Abrir sesion"><i class="material-icons">input</i></a></td>
						          	<td><a onclick="confirm()" href="../../controller/sesiones/borrarSesion.php?noSesion=<?php echo $rows['noSesion']?>&idProyecto=<?php echo $idProyecto?>" class="btn tooltipped red" data-position="bottom" data-delay="50" data-tooltip="Eliminar sesion"><i class="material-icons">cancel</i></a></td>
						          	<td><a href="residentes.php?noSesion=<?php echo $rows['noSesion'];?>&idProyecto=<?php echo $idProyecto;?>" class="btn tooltipped green accent-3" data-position="bottom" data-delay="50" data-tooltip="Reporte"><i class="material-icons">assignment</i></a></td>
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
</script>
</html>