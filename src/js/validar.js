function validar(){
	
	var excorreo=/\w+@+\w+\.+[a-z]/;
	var exClave=/(?=^.{4,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
	var correo=document.getElementById("email").value;
	var clave=document.getElementById("password").value;
	var clave2=document.getElementById("confpassword").value;
	if(clave==""){
	alert("Debes ingresar una contraseña");
	return false;
	}else if(clave.length<8){
    alert("Las contraseñas debe contener al menos 8 caracteres");
    return false;
    }else if(clave2==""){
	alert("Debes confirmar la contraseña");
	return false;
	}else if(clave!=clave2){
	alert("Las contraseñas no coinciden");
	return false;
	}else if(!exClave.test(clave)){
	alert("Contraseña debe contener al menos una letra mayuscula, una minuscula y un número o caracter especial");
	return false;
	}else if(clave!=clave2){
    alert("Las contraseñas no coinciden");
    return false;
	}
}



