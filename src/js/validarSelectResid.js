function validarSelectResid(){
   	var indiceSemestre = document.frmAgregar.semestre.selectedIndex;
	var indiceCarrera=document.frmAgregar.carrera.selectedIndex;
	if(indiceSemestre==0){
		alert("Debe seleccionar un semestre");
		return false;
	}
	if(indiceCarrera==0){
		alert("Debe seleccionar una carrera");
		return false;
	}
}



