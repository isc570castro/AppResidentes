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
	<title>Actualizar proyecto | SGR</title>
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
        		<li class="active"><a href="proyectos.php"><i class="material-icons left">business_center</i>Proyectos</a></li>
        		<li><a href="../relaciones/relaciones.php"><i class="material-icons left">repeat</i>Asignaciones</a></li>
        		<li><a href="../sesiones/sesiones.php"><i class="material-icons left">date_range</i>Sesiones</a></li>
        		<li><a href="../../controller/logout.php"><i class="material-icons right">directions_run</i>Cerrar sesión</a></li>
      		</ul>
    	</div>
  	</nav>
	<?php
	include "../../model/conexion.php";
	$objConex = new Conexion();
	$link=$objConex->conectarse();
	$sql = mysql_query("SELECT * FROM proyecto" , $link) or die(mysql_error());				
	
	
	?>
  	<div class="container">
	 	<div class="row">
			<div class="col m12">
			    <div class="card-panel white z-depth-3">
			    	<H3 align="center">Actualizar proyecto</H3>
				  	<div class="row">
					    <form class="col s12" action="editar.php" method="POST" enctype="multipart/form-data" name="frmModificar">
					    	<h4><i class="material-icons left" style="font-size: 40px;">cached</i>Actualizar</h4>
					    	<div class="divider"></div>
					      	<div class="row">
					      		<div class="col m2">
					      			<h5>Nombre del proyecto</h5>
					      		</div>
						        <div class="input-field col m10">
						        <select name="idProyecto">
								<?php					        	
								while ($rows = mysql_fetch_array($sql)){   
								?>
      								<option value="<?php echo $rows['idProyecto']; ?>"><?php echo $rows['nombreProyecto']; ?></option>
    							<?php
								}
    							?>
    							</select>
					        	</div>
  							<a class="waves-effect waves-light btn red right" href="proyectos.php">Cancelar</a>
					      	<button class="btn waves-effect waves-light blue right" type="submit" name="action">Aceptar</button>
					    </form>
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
</html>