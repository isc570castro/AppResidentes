function validarRegistro(){

	var clave=document.getElementById("password").value;
	var clave2=document.getElementById("confpassword").value;
	alert("Perro");
	if(clave!=clave2){
		alert("Las contraseñas no coinciden");
		return false;
	}
}



