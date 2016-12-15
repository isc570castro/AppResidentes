<?php
	session_start();
	$usuario=$_SESSION['login'];
	$seguridad = $_SESSION['seguridad'];
	if (!isset($seguridad)) {
	echo "<script type='text/javascript'> alert('Sin acceso'); </script>";
	header('Location: ../index.html');
	}
	include "../model/conexion.php";
	$objConex = new Conexion();
	$link=$objConex->conectarse();
	$sql = mysql_query("SELECT  *  FROM sesiones, proyecto WHERE (sesiones.idProyecto=proyecto.idProyecto) and sesiones.estado='Pendiente'", $link) or die(mysql_error());					
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../src/materialize/css/materialize.min.css">
	<link rel="stylesheet" href="../src/materialize/fonts/material-design-icons/material-icons.css">
	<script src="../src/materialize/js/jquery.js"></script>
	<script src="../src/materialize/js/materialize.min.js"></script>
	<title>Inicio | SGR</title>
</head>
<body class="grey lighten-2">
	<div class="container">
		<div class="row">
			<br/>
			<div class="col m2 push-m1">
				<img src="../src/img/mapache.png" alt="" class="responsive-img">
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
      		<a href="#" class="brand-logo">Menu Principal</a>
      		<ul id="nav-mobile" class="right hide-on-med-and-down">
        		<li><a href="residentes/residentes.php"><i class="material-icons left">people</i>Residentes</a></li>
        		<li><a href="proyectos/proyectos.php"><i class="material-icons left">business_center</i>Proyectos</a></li>
        		<li><a href="relaciones/relaciones.php"><i class="material-icons left">repeat</i>Asignaciones</a></li>
        		<li><a href="sesiones/sesiones.php"><i class="material-icons left">date_range</i>Sesiones</a></li>
        		<li><a href="../controller/logout.php"><i class="material-icons right">directions_run</i>Cerrar sesión</a></li>
      		</ul>
    	</div>
  	</nav>
  	<div class="container">
	 	<div class="row">
			<div class="col m12">
			    <div class="card-panel white z-depth-3">
			       	<H3 align="center">Bienvenido</H3>
			       	<div class="row">
				       	<div class="col m3">
				       		<a href="residentes/residentes.php">
				    		<div class="card-panel amber darken-3 z-depth-5 center">
								<h4 class="white-text">Residentes</h4>
				    			<i class="material-icons center" style="font-size: 100px; color: black;">people</i>
				   			</div>
				   			</a>
						</div>
						<div class="col m3">
				    		<a href="proyectos/proyectos.php">
				    		<div class="card-panel amber darken-3 z-depth-5 center">
								<h4 class="white-text">Proyectos</h4>
				    			<i class="material-icons center" style="font-size: 100px; color: black;">business_center</i>
				   			</div>
				   			</a>
						</div>
						<div class="col m3">
				    		<a href="sesiones/sesiones.php">
				    		<div class="card-panel amber darken-3 z-depth-5 center">
								<h4 class="white-text">Asignación</h4>
				    			<i class="material-icons center" style="font-size: 100px; color: black;">repeat</i>
				   			</div>
				   			</a>
						</div>
						<div class="col m3">
				    		<a href="sesiones/sesiones.php">
				    		<div class="card-panel amber darken-3 z-depth-5 center">
								<h4 class="white-text">Sesiones</h4>
				    			<i class="material-icons center" style="font-size: 100px; color: black;">date_range</i>
				   			</div>
				   			</a>
						</div>
					</div>
			    </div>
			</div>
		</div>
  	</div>
  	<div class="row">
	  	<div id="modal1" class="modal">
			<div class="modal-content">
				<h4>Sesiones pendientes</h4>
				<table class="centered striped bordered z-depth-3">
					<thead>
						<tr>
						    <th>Proyecto</th>
						    <th>Fecha</th>
						    <th>Hora</th>
						    <th></th>
						</tr>
					</thead>
					<tbody>
						        <?php
						        while ($rows = mysql_fetch_array($sql)){   
								?>
								<tr>
									
									<td><?php echo $rows ['nombreProyecto']; ?></td>
									<td><?php echo $rows ['fecha']; ?></td>
									<td><?php echo $rows ['hora']; ?></td>
						          	<td><a href="sesiones/anotaciones.php?idProyecto=<?php echo $rows['idProyecto']?>&noSesion=<?php echo $rows['noSesion']?>" class="btn tooltipped blue" data-position="bottom" data-delay="50" data-tooltip="Abrir sesiones"><i class="material-icons">input</i></a></td>
						         </tr>
						    	<?php 
								}
						    	?>
						        </tbody>
			    </table>
			</div>
			<div class="modal-footer">
				<a href="#" class=" modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	 $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  	$('#modal1').modal('open');
  	});
</script>
</html>