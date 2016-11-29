<?php
	$idProyecto=$_REQUEST['idProyecto'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../src/materialize/css/materialize.min.css">
	<link rel="stylesheet" href="../../src/materialize/fonts/material-design-icons/material-icons.css">
	<link rel="stylesheet" href="../../src/materialize/css/materialize.clockpicker.css"></link>
	<script src="../../src/materialize/js/jquery.js"></script>
	<script src="../../src/materialize/js/materialize.min.js"></script>
    <script src="../../src/materialize/js/materialize.clockpicker.js"></script>
	<title>Agregar relación | SGR</title>
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
        		<li class="active"><a href=""><i class="material-icons left">repeat</i>Asignaciones</a></li>
        		<li><a href="../sesiones/sesiones.html"><i class="material-icons left">date_range</i>Sesiones</a></li>
        		<li><a href="#"><i class="material-icons right">directions_run</i>Cerrar sesión</a></li>
      		</ul>
    	</div>
  	</nav>
  	<div class="container">
	 	<div class="row">
			<div class="col m12">
			    <div class="card-panel white z-depth-3">
			       	<H3 align="center">Nueva sesion</H3>
				  	<div class="row">
					    <form class="col s12" action="../../controller/sesiones/agregarSesion.php?idProyecto=<?php echo $idProyecto; ?>" method="POST" enctype="multipart/form-data" name="frmAgregar">
					      	<div class="row">
					      		<div class="col m2">
					      			<h5>Fecha</h5>
					      		</div>
						        <div class="input-field col m4">
						        		<input type="date" class="datepicker" name="fecha">
					        	</div>
					        	<div class="col m2">
					      			<h5>Hora</h5>
					      		</div>
						        <div class="input-field col m4">
								<input id="timepicker" class="timepicker" type="time" name="hora">
					        	</div>
					      	</div>
  							<a class="waves-effect waves-light btn red right" href="relaciones.html">Cancelar</a>
					      	<button class="btn waves-effect waves-light blue right" type="submit" name="action">Aceptar
  							</button>
					    </form>  			
    							</div>
					      	</div>
				 	 </div>
			    </div>
			</div>
		</div>
  	</div>
</body>
<script>
  $(document).ready(function() {
    $('select').material_select();
  });     
</script>
<script>
$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
</script>
<script>
  $('#timepicker').pickatime({
    autoclose: false,
    twelvehour: true,
  });
</script>
</html>