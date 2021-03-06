<?php 
$password=$_REQUEST['password'];
$confpassword=$_REQUEST['confpassword'];
$email=$_REQUEST['email'];
$pregunta=$_REQUEST['pregunta'];
$respuesta=$_REQUEST['respuesta'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="src/materialize/css/materialize.min.css">
	<link rel="stylesheet" href="src/materialize/fonts/material-design-icons/material-icons.css">
	<script src="src/materialize/js/jquery.js"></script>
	<script src="src/materialize/js/materialize.min.js"></script>
	<script src="src/js/validarRegistro.js"></script>
	<title>Registrar Usuario | SGR</title>

</head>
<body class="grey lighten-2">
	<div class="col m12 teal">
  			<br>
  			<br>
  	</div>
  	<div class="container">
  		<div class="row">
  			<div class="col m4 push-m4">
  				<div class="card-panel white z-depth-4">	
  					<div class="row">
  						<h4 class="center">Registrar usuario</h4>
					    <div class="row">
  						</div>
					    <form class="col s12" action="controller/registrar.php" enctype="multipart/form-data" method="POST">
					     	<div class="row">
					        	<div class="input-field col s12">
					          		<input id="usuario" type="text" pattern="[a-zA-Z ]+" length="15" maxlength="15" class="validate" name="usuario" required autofocus>
					          		<label for="usuario" data-error="Solo se aceptan letras">Nombre de usuario</label>
					        	</div>
					      	</div>
					      	<div class="row">
					        	<div class="input-field col s12">
					          		<input id="password" type="password" length="8" maxlength="8" class="validate" name="password" required value="<?php echo $password; ?>">
					          		<label for="password">Contraseña</label>
					        	</div>
					      	</div>
					      	<div class="row">
					        	<div class="input-field col s12">
					          		<input id="confpassword" type="password" length="8" maxlength="8" class="validate" name="confpassword" required value="<?php echo $confpassword; ?>">
					          		<label for="confpassword">Confirmar contraseña</label>
					        	</div>
					      	</div>
					      	<div class="row">
					        	<div class="input-field col s12">
					          		<input id="email" type="email" length="25" maxlength="25" class="validate" name="email" required value="<?php echo $email; ?>">
					          		<label for="email" data-error="Solo se acepta este formato: ejemplo@email.com">Correo electrónico</label>
					        	</div>
					      	</div>
					      	<div class="row">
					        	<div class="input-field col s12">
					          		<input id="pregunta" type="text" length="50" maxlength="50" class="validate" name="pregunta" required value="<?php echo $pregunta; ?>">
					          		<label for="pregunta">Pregunta secreta</label>
					        	</div>
					      	</div>
					      	<div class="row">
					        	<div class="input-field col s12">
					          		<input id="respuesta" type="text" length="20" maxlength="20" class="validate" name="respuesta" required value="<?php echo $respuesta; ?>">
					          		<label for="respuesta">Respuesta</label>
					        	</div>
					      	</div>
					      	<button class="btn waves-effect waves-light right" type="submit" name="action" onclick="return validarRegistro();">Registrar
  							</button>
					    </form>
					</div>
        		</div>
  			</div>
  		</div>
  	</div>
</body>
</html>