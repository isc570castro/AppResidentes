<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../src/materialize/css/materialize.min.css">
	<link rel="stylesheet" href="../../src/materialize/fonts/material-design-icons/material-icons.css">
	<script src="../../src/materialize/js/jquery.js"></script>
	<script src="../../src/materialize/js/materialize.min.js"></script>
	<title>Editar proyecto | SGR</title>
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
        		<li class="active"><a href="proyectos.php"><i class="material-icons left">business_center</i>Proyectos</a></li>
        		<li><a href="../relaciones/relaciones.php"><i class="material-icons left">repeat</i>Asignaciones</a></li>
        		<li><a href="../sesiones/sesiones.php"><i class="material-icons left">date_range</i>Sesiones</a></li>
        		<li><a href="#"><i class="material-icons right">directions_run</i>Cerrar sesión</a></li>
      		</ul>
    	</div>
  	</nav>
<?php
	$idProyecto=$_REQUEST['idProyecto'];
	include "../../model/conexion.php";
	$objConex = new Conexion();
	$link=$objConex->conectarse();
	$sql = mysql_query("SELECT * FROM proyecto WHERE idProyecto='$idProyecto';" , $link) or die(mysql_error());				
	$rows = mysql_fetch_array($sql);
	$nombreProyecto=$rows['nombreProyecto'];
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
					    <form class="col s12" action="../../controller/proyectos/actualizarProyecto.php?idProyecto=<?php echo $idProyecto;?>" method="POST" enctype="multipart/form-data" name="frmAgregar">
					    	<h4><i class="material-icons left" style="font-size: 40px;">work</i>Datos del proyecto</h4>
					    	<div class="divider"></div>
					      	<div class="row">
					      		<div class="col m2">
					      			<h5>Nombre del proyecto</h5>
					      		</div>
						        <div class="input-field col m10">
						        	<input id="first_name" type="text" class="validate" name="nombreProyecto" value="<?php echo $nombreProyecto; ?>">
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
					      		<h4><i class="material-icons left" style="font-size: 40px;">date_range</i>Periodo del proyecto</h4>
					    	<div class="divider"></div>
					      	<div class="row">
					      		<div class="col m2">
					      			<h5>Fecha de inicio del proyecto</h5>
					      		</div>
						        <div class="input-field col m5">
						        	<select id="a" name="mesInicio">
      									<option value="<?php echo $rows['mesInicio']?>" disabled selected><?php echo $rows['mesInicio'];?></option>
      									<option value="Enero">Enero</option>
      									<option value="Febrero">Febrero</option>
      									<option value="Marzo">Marzo</option>
      									<option value="Abril">Abril</option>
      									<option value="Mayo">Mayo</option>
      									<option value="Junio">Junio</option>
      									<option value="Julio">Julio</option>
      									<option value="Agosto">Agosto</option>
      									<option value="Septiembre">Septiembre</option>
      									<option value="Octubre">Octubre</option>
      									<option value="Noviembre">Noviembre</option>
      									<option value="Diciembre">Diciembre</option>
    								</select>
					        	</div>
								<div class="input-field col m5">
						        	<input id="a" type="text" pattern="[0-9]+" length="4" maxlength="4" class="validate" name="yearInicio" required value="<?php echo $rows['yearInicio']?>">
						         	<label for="a" data-error="Solo se aceptan numeros">Año de inicio</label>
					        	</div>
					      	</div>
					      	<div class="row">
					      		<div class="col m2">
					      			<h5>Fecha de fin del proyecto</h5>
					      		</div>
						        <div class="input-field col m5">
						        	<select id="a" name="mesFin">
      									<option value="<?php echo $rows['mesFin']?>" disabled selected><?php echo $rows['mesFin'];?></option>
      									<option value="Enero">Enero</option>
      									<option value="Febrero">Febrero</option>
      									<option value="Marzo">Marzo</option>
      									<option value="Abril">Abril</option>
      									<option value="Mayo">Mayo</option>
      									<option value="Junio">Junio</option>
      									<option value="Julio">Julio</option>
      									<option value="Agosto">Agosto</option>
      									<option value="Septiembre">Septiembre</option>
      									<option value="Octubre">Octubre</option>
      									<option value="Noviembre">Noviembre</option>
      									<option value="Diciembre">Diciembre</option>
    								</select>
					        	</div>
								<div class="input-field col m5">
						        	<input id="a" type="text" pattern="[0-9]+" length="4" maxlength="4" class="validate" name="yearFin" required value="<?php echo $rows['yearFin']?>">
						         	<label for="a" data-error="Solo se aceptan numeros">Año de fin</label>
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
