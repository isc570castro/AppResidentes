<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../src/materialize/css/materialize.min.css">
	<link rel="stylesheet" href="../../src/materialize/fonts/material-design-icons/material-icons.css">
	<script src="../../src/materialize/js/jquery.js"></script>
	<script src="../../src/materialize/js/materialize.min.js"></script>
	<title>Calificar alumno| SGR</title>
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
			       	<H3 align="center">Calificar alumno</H3>
					<div class="row">
						<div class="col m12">
							<h4><i class="material-icons left" style="font-size: 40px;">playlist_add_check</i>Aspectos a calificar</h4>
					    	<div class="divider"></div>
					      	<div class="row">
					      		<div class="col m8">
					      			<h5>1.- Mostró responsabilidad y compromiso en la Residencia Profesional</h5>
					      		</div>
						        <div class="input-field col m1">
						        	<input id="ab" type="number" pattern="[0-9]+" min="0" max="5" class="validate center" name="nombre" required>
						         	<label for="ab" data-error="Solo se aceptan numeros"></label>
					        	</div>
					        	<div class="col m2">
					        		<h5>De 0 a 5 puntos</h5>
					        	</div>
					        </div>
					        <div class="row">
					      		<div class="col m8">
					      			<h5>2.- Realizó un trabajo innvador en su área de desempeño</h5>
					      		</div>
						        <div class="input-field col m1">
						        	<input id="ab" type="number" pattern="[0-9]+" min="0" max="10" class="validate center" name="nombre" required>
						         	<label for="ab" data-error="Solo se aceptan numeros"></label>
					        	</div>
					        	<div class="col m2">
					        		<h5>De 0 a 10 puntos</h5>
					        	</div>
					        </div>
					        <div class="row">
					      		<div class="col m8">
					      			<h5>3.- Aplica las competencias para la realización del proyecto</h5>
					      		</div>
						        <div class="input-field col m1">
						        	<input id="ab" type="number" pattern="[0-9]+" min="0" max="10" class="validate center" name="nombre" required>
						         	<label for="ab" data-error="Solo se aceptan numeros"></label>
					        	</div>
					        	<div class="col m2">
					        		<h5>De 0 a 10 puntos</h5>
					        	</div>
					        </div>
					        <div class="row">
					      		<div class="col m8">
					      			<h5>4.- Es dedicado y proactivo en los trabajos encomendados</h5>
					      		</div>
						        <div class="input-field col m1">
						        	<input id="ab" type="number" pattern="[0-9]+" min="0" max="10" class="validate center" name="nombre" required>
						         	<label for="ab" data-error="Solo se aceptan numeros"></label>
					        	</div>
					        	<div class="col m2">
					        		<h5>De 0 a 10 puntos</h5>
					        	</div>
					        </div>
					        <div class="row">
					      		<div class="col m8">
					      			<h5>5.- Cumple con los objetivos correspondientes al proyecto</h5>
					      		</div>
						        <div class="input-field col m1">
						        	<input id="ab" type="number" pattern="[0-9]+" min="0" max="10" class="validate center" name="nombre" required>
						         	<label for="ab" data-error="Solo se aceptan numeros"></label>
					        	</div>
					        	<div class="col m2">
					        		<h5>De 0 a 10 puntos</h5>
					        	</div>
					        </div>
					        <div class="row">
					      		<div class="col m8">
					      			<h5>6.- Entrega en tiempo y forma el informe técnico</h5>
					      		</div>
						        <div class="input-field col m1">
						        	<input id="ab" type="number" pattern="[0-9]+" min="0" max="5" class="validate center" name="nombre" required>
						         	<label for="ab" data-error="Solo se aceptan numeros"></label>
					        	</div>
					        	<div class="col m2">
					        		<h5>De 0 a 5 puntos</h5>
					        	</div>
					        </div>
					        <a class="waves-effect waves-light btn red right" href="concluir.php" type="reset">Cancelar</a>
					      	<button class="btn waves-effect waves-light blue right" type="submit" name="action">Aceptar
  							</button>
						</div>
					</div>
			    </div>
			</div>
		</div>
  	</div>
</body>
</script>
</html>