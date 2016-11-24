<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../src/materialize/css/materialize.min.css">
	<link rel="stylesheet" href="../../src/materialize/fonts/material-design-icons/material-icons.css">
	<script src="../../src/materialize/js/jquery.js"></script>
	<script src="../../src/materialize/js/materialize.min.js"></script>
	<title>Agregar proyecto | SGR</title>
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
        		<li><a href="../residentes/residentes.html"><i class="material-icons left">people</i>Residentes</a></li>
        		<li class="active"><a href=""><i class="material-icons left">business_center</i>Proyectos</a></li>
        		<li><a href="../relaciones/relaciones.html"><i class="material-icons left">repeat</i>Asignaciones</a></li>
        		<li><a href="../sesiones/sesiones.html"><i class="material-icons left">date_range</i>Sesiones</a></li>
        		<li><a href="#"><i class="material-icons right">directions_run</i>Cerrar sesión</a></li>
      		</ul>
    	</div>
  	</nav>
<?php
	$nombreProyecto=$_POST['nombreProyecto'];
	include "../../model/conexion.php";
	$objConex = new Conexion();
	$link=$objConex->conectarse();
	$sql = mysql_query("SELECT * FROM proyecto WHERE nombreProyecto='$nombreProyecto';" , $link) or die(mysql_error());				
	$rows = mysql_fetch_array($sql);
	$idProyecto=$rows['idProyecto'];
 	$asesorExterno=$rows['asesorExterno'];
 	$asesorInterno=$rows['asesorInterno'];
	$nombreEmpresa=$rows['nombreEmpresa'];
	$duenoEmpresa=$rows['duenoEmpresa'];
	$calle=$rows['calle'];
	$numero=$rows['numero'];
	$colonia=$rows['colonia'];
	$cp=$rows['cp'];
	$telefono=$rows['telefonoEmpresa'];
	$estado=$rows['estado'];
?>
  	<div class="container">
	 	<div class="row">
			<div class="col m12">
			    <div class="card-panel white z-depth-3">
			    	<H3 align="center">Agregar proyecto</H3>
				  	<div class="row">
					    <form class="col s12" action="../../controller/proyectos/actualizarProyecto.php" method="POST" enctype="multipart/form-data" name="frmAgregar">
					    	<h4><i class="material-icons left" style="font-size: 40px;">work</i>Datos del proyecto</h4>
					    	<div class="divider"></div>
					      	<div class="row">
					      		<div class="col m2">
					      			<h5>Nombre del proyecto</h5>
					      		</div>
						        <div class="input-field col m10">
						        	<input id="first_name" type="text" class="validate" name="nombreProyecto" readonly value="<?php echo $nombreProyecto ?>">
					        	</div>
					      	</div>
					      	<div class="row">
					      		<div class="col m2">
					      			<h5>Asesor externo</h5>
					      		</div>
						        <div class="input-field col m10">
						        	<input id="first_name" type="text" class="validate" name="asesorExterno" value="<?php echo $asesorExterno; ?>">
					        	</div>
					      	</div>
					      	<div class="row">
					      		<div class="col m2">
					      			<h5>Asesor interno</h5>
					      		</div>
						        <div class="input-field col m10">
						        	<input id="first_name" type="text" class="validate" name="asesorInterno" value="<?php echo $asesorInterno; ?>">
					        	</div>
					      	</div>
					      	<h4><i class="material-icons left" style="font-size: 40px;">domain</i>Datos de la empresa</h4>
					    	<div class="divider"></div>
					    	<div class="row">
					      		<div class="col m2">
					      			<h5>Nombre</h5>
					      		</div>
						        <div class="input-field col m10">
						        	<input id="first_name" type="text" class="validate" name="nombreEmpresa" value="<?php echo $nombreEmpresa; ?>">
					        	</div>
					      	</div>
					    	<div class="row">
					      		<div class="col m2">
					      			<h5>Dueño</h5>
					      		</div>
						        <div class="input-field col m10">
						        	<input id="first_name" type="text" class="validate" name="duenoEmpresa" value="<?php echo $duenoEmpresa; ?>">
					        	</div>
					      	</div>
					      	<div class="row">
					      		<div class="col m2">
					      			<h5>Dirección</h5>
					      		</div>
						        <div class="input-field col m4">
						        	<input id="first_name" type="text" class="validate" name="calle" value="<?php echo $calle; ?>">
						         	<label for="first_name">Calle</label>
					        	</div>
					        	<div class="input-field col m1">
					          		<input id="last_name" type="number" class="validate" name="numero" value="<?php echo $numero; ?>">
					          		<label for="last_name">Número</label>
					        	</div>
					        	<div class="input-field col m4">
					          		<input id="last_name" type="text" class="validate" name="colonia" value="<?php echo $colonia; ?>">
					          		<label for="last_name">Colonia</label>
					        	</div>
					        	<div class="input-field col m1">
					          		<input id="last_name" type="text" class="validate" name="cp" value="<?php echo $cp; ?>">
					          		<label for="last_name">C.P.</label>
					        	</div>
					      	</div>
					      	<div class="row">
					      		<div class="col m2">
					      			<h5>Teléfono</h5>
					      		</div>
						        <div class="input-field col m10">
						        	<input id="first_name" type="number" class="validate" name="telefono" value="<?php echo $telefono; ?>">
					        	</div>
					      	</div>
					      	<div class="row">
					      		<div class="col m2">
					      			<h5>Estado</h5>
					      		</div>
					      		<div class="input-field col m10">
					      			<select name="estado">
      								<option value="Proceso">Proceso</option>
      								<option value="Cancelado">Cancelado</option>
      								<option value="Concluido">Concluido</option>
    								</select>
    							</div>
					      	</div>
  							<a class="waves-effect waves-light btn red right" href="proyectos.html" type="reset">Cancelar</a>
					      	<button class="btn waves-effect waves-light blue right" type="submit" name="action">Aceptar
  							</button>
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
