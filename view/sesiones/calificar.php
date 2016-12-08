<?php 
	session_start();
	$usuario=$_SESSION['login'];
	$seguridad = $_SESSION['seguridad'];
	if (!isset($seguridad)) {
	echo "<scrit type='text/javascript'> alert('Sin acceso'); </script>";
	header('Location: ../../index.html');
	}
$idProyecto=$_REQUEST['idProyecto'];
$noControl=$_REQUEST['noControl'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../src/materialize/css/materialize.min.css">
	<link rel="stylesheet" href="../../src/materialize/fonts/material-design-icons/material-icons.css">
	<script src="../../src/materialize/js/jquery.js"></script>
	<script type="text/javascript">
		function sumaCalif(){
			var primera = $("#primera").val();
			primera = parseInt(primera);
			if (isNaN(primera)){
				primera=0;
			}
			var segunda = $("#segunda").val();
			segunda = parseInt(segunda);
			if (isNaN(segunda)){
				segunda=0;
			}
			var tercera = $("#tercera").val();
			tercera = parseInt(tercera);
			if (isNaN(tercera)){
				tercera=0;
			}
			var cuarta = $("#cuarta").val();
			cuarta = parseInt(cuarta);
			if (isNaN(cuarta)){
				cuarta=0;
			}
			var quinta = $("#quinta").val();
			quinta = parseInt(quinta);
			if (isNaN(quinta)){
				quinta=0;
			}
			var sexta = $("#sexta").val();
			sexta = parseInt(sexta);
			if (isNaN(sexta)){
				sexta=0;
			}

			var calificacion = primera + segunda + tercera + cuarta + quinta + sexta;
			$("#calificacion").val(calificacion);
		}
	</script>
	<title>Calificar residente| SGR</title>
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
			       	<H3 align="center">Calificar residente</H3>
					<div class="row">
					    <form action="../../controller/residentes/asignarCalificacion.php?noControl=<?php echo $noControl; ?>&idProyecto=<?php echo $idProyecto; ?>" method="POST" enctype="multipart/form-data" name="frmBuscar">
							<div class="col m12">
								<h4><i class="material-icons left" style="font-size: 40px;">playlist_add_check</i>Aspectos a calificar</h4>
						    	<div class="divider"></div>
						      	<div class="row">
						      		<div class="col m8">
						      			<h5>1.- Mostró responsabilidad y compromiso en la Residencia Profesional</h5>
						      		</div>
							        <div class="input-field col m1">
							        	<input id="primera" type="number" pattern="[0-9]+" min="0" max="5" name="requisitouno" class="validate center" onblur="sumaCalif();" required>
							         	<label for="primera" data-error="Dato inválido"></label>
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
							        	<input id="segunda" type="number" pattern="[0-9]+" min="0" name="requisitodos" max="10" class="validate center"  onblur="sumaCalif();" required>
							         	<label for="ab" data-error="Dato inválido"></label>
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
							        	<input id="tercera" type="number" pattern="[0-9]+" min="0" max="10" class="validate center"  onblur="sumaCalif();" required name="requisitotres">
							         	<label for="ab" data-error="Dato inválido"></label>
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
							        	<input id="cuarta" type="number" pattern="[0-9]+" min="0" max="10" class="validate center"  onblur="sumaCalif();" required name="requisitocuatro">
							         	<label for="ab" data-error="Dato inválido"></label>
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
							        	<input id="quinta" type="number" pattern="[0-9]+" min="0" max="10" class="validate center"  onblur="sumaCalif();" required name="requisitocinco">
							         	<label for="ab" data-error="Dato inválido"></label>
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
							        	<input id="sexta" type="number" pattern="[0-9]+" min="0" max="5" class="validate center"  onblur="sumaCalif();" required name="requisitoseis">
							         	<label for="ab" data-error="Dato inválido"></label>
						        	</div>
						        	<div class="col m2">
						        		<h5>De 0 a 5 puntos</h5>
						        	</div>
						        </div>
						        <div class="row">
						      		<div class="col m8">
						      			<h5><b>Calificación<b></h5>
						      		</div>
							        <div class="input-field col m2">
							        	<input id="calificacion" type="number" pattern="[0-9]+" min="0" max="5" class="validate center" name="calificacion" required readonly value="0">
						        	</div>
						        </div>
						        <div class="row">
					      		<div class="col m12">
					      			<h5>Observaciones</h5>
					      		</div>
						        	<div class="input-field col m12">
						        		<textarea id="textarea1" class="materialize-textarea" length="120" name="observaciones"></textarea>
					        		</div>
					        	</div>
						        <a class="waves-effect waves-light btn red right" href="concluir.php" type="reset">Cancelar</a>
						      	<button class="btn waves-effect waves-light blue right" type="submit" name="action">Aceptar
	  							</button>
							</div>
						</form>
					</div>
			    </div>
			</div>
		</div>
  	</div>
</body>
</script>
</html>