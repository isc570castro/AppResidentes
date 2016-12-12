function validarSelectProy(){
   	var indiceMesInicio = document.frmAgregar.mesInicio.selectedIndex;
	var indiceMesFin=document.frmAgregar.mesFin.selectedIndex;
	if(indiceMesInicio==0){
		alert("Debe seleccionar el mes de inicio");
		return false;
	}
	if(indiceMesFin==0){
		alert("Debe seleccionar el mes de fin");
		return false;
	}
}