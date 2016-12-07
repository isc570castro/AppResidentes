<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="src/materialize/css/materialize.min.css">
	<link rel="stylesheet" href="src/materialize/fonts/material-design-icons/material-icons.css">
	<script src="src/materialize/js/jquery.js"></script>
	<script src="src/materialize/js/materialize.min.js"></script>
	<title>Recuperar contraseña | SGR</title>

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
  						<h5 class="center">Recuperar contraseña</h5>
					    <div class="row">
  						</div>
					    <form class="col s12" method="POST">
					     	<div class="row">
        						<div class="input-field col s12">
						        	<input disabled value="Pregunta secreta" id="disabled" type="text" class="validate">
						          	<label for="disabled">Pregunta</label>
						        </div>
						    </div>
					     	<div class="row">
					        	<div class="input-field col s12">
					          		<input id="username" type="text" class="validate" name="username">
					          		<label for="username">Respuesta</label>
					        	</div>
					      	</div>
					      	<button class="btn waves-effect waves-light right" type="submit" name="action">Aceptar
  							</button>
					    </form>
					</div>
        		</div>

  		</div>
  	</div>
</body>
</html>