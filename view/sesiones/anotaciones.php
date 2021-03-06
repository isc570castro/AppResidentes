<?php 
	session_start();
	$usuario=$_SESSION['login'];
	$seguridad = $_SESSION['seguridad'];
	if (!isset($seguridad)) {
	echo "<scrit type='text/javascript'> alert('Sin acceso'); </script>";
	header('Location: ../../index.html');
	}
$noSesion=$_REQUEST['noSesion'];
$idProyecto=$_REQUEST['idProyecto'];
 include "../../model/conexion.php";
	$objConex = new Conexion();
	$link=$objConex->conectarse();
	$sql = mysql_query("SELECT  *  FROM sesiones WHERE idProyecto='$idProyecto' and noSesion = '$noSesion'", $link) or die(mysql_error());	
  $rows = mysql_fetch_array($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../src/materialize/css/materialize.min.css">
	<link rel="stylesheet" href="../../src/materialize/fonts/material-design-icons/material-icons.css">
	<script src="../../src/materialize/js/jquery.js"></script>
	<script src="../../src/materialize/js/materialize.min.js"></script>
	<title>Anotaciones | SGR</title>
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
        		<li><a href="../../controller/logout.php"><i class="material-icons right">directions_run</i>Cerrar sesión</a></li>
      		</ul>
    	</div>
  	</nav>
  	<div class="container">
	 	<div class="row">
			<div class="col m12">
			    <div class="card-panel white z-depth-3">
			       	<H3 align="center">Sesion <?php echo $noSesion?></H3>
				  	<div class="row">
					    <form class="col s12" action="../../controller/sesiones/actualizarSesion.php?idProyecto=<?php echo $idProyecto; ?>&noSesion=<?php echo $noSesion; ?>" method="POST" enctype="multipart/form-data" name="frmAgregar">
					      	<div class="row">
					      		<div class="col m12">
					      			<h5>Avances</h5>
					      		</div>
						        <div class="input-field col m12">
						        	<textarea id="textarea1" class="materialize-textarea" length="120" maxlength="120" name="avances"></textarea>
					        	</div>
					        	<div class="col m12">
					      			<h5>Observaciones</h5>
					      		</div>
						        <div class="input-field col m12">
						        	<textarea id="textarea2" class="materialize-textarea" length="120" maxlength="120" name="observaciones"></textarea>
					        	</div>
					      	</div>
					      	<div class="row">
					      		<div class="col m2">
					      			<h5>Estado</h5>
					      		</div>
						        <div class="input-field col m3">
						        	<select name="estado">
						        		<option value="<?php echo $rows['estado'];?>"><?php echo $rows['estado'];?></option>
						        		<option value="Pendiente">Pendiente</option>
						        		<option value="Concluido">Concluido</option>
						        		<option value="Cancelado">Cancelado</option>
						        	</select>

					        	</div>
					      	</div>
  							<a class="btn waves-effect waves-light red right" href="historial.php?idProyecto=<?php  echo $idProyecto; ?>">Cancelar</a>
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
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });

  $(document).ready(function() {
    $('select').material_select();
  });
</script>

</html>