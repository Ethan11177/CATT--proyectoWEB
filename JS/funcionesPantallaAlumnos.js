function habilitamosCampos(){   //Habilitamos y desabilitamos algunos campos
    document.getElementById("nombre1").disabled = false;
    document.getElementById("apellidos1").disabled = false;
    document.getElementById("boleta1").disabled = false;
    document.getElementById("correo1").disabled = false;
    document.getElementById("telefono1").disabled = false;
    document.getElementById("nombre2").disabled = false;
    document.getElementById("apellidos2").disabled = false;
    document.getElementById("boleta2").disabled = false;
    document.getElementById("correo2").disabled = false;
    document.getElementById("telefono2").disabled = false;
    document.getElementById("nombre3").disabled = false;
    document.getElementById("apellidos3").disabled = false;
    document.getElementById("boleta3").disabled = false;
    document.getElementById("correo3").disabled = false;
    document.getElementById("telefono3").disabled = false;
    document.getElementById("nombre4").disabled = false;
    document.getElementById("apellidos4").disabled = false;
    document.getElementById("boleta4").disabled = false;
    document.getElementById("correo4").disabled = false;
    document.getElementById("telefono4").disabled = false;
    document.getElementById("tituloTT").disabled = false;
    document.getElementById("descripcionTT").disabled = false;

    document.getElementById("actualizar").style.display = '';
    document.getElementById("cancelar").style.display = '';
    document.getElementById("editar").style.display = 'none';
    document.getElementById("generar").style.display = 'none';
}
function cancelamosEdicion(){
    document.getElementById("nombre1").disabled = true;
    document.getElementById("apellidos1").disabled = true;
    document.getElementById("boleta1").disabled = true;
    document.getElementById("correo1").disabled = true;
    document.getElementById("telefono1").disabled = true;
    document.getElementById("nombre2").disabled = true;
    document.getElementById("apellidos2").disabled = true;
    document.getElementById("boleta2").disabled = true;
    document.getElementById("correo2").disabled = true;
    document.getElementById("telefono2").disabled = true;
    document.getElementById("nombre3").disabled = true;
    document.getElementById("apellidos3").disabled = true;
    document.getElementById("boleta3").disabled = true;
    document.getElementById("correo3").disabled = true;
    document.getElementById("telefono3").disabled = true;
    document.getElementById("nombre4").disabled = true;
    document.getElementById("apellidos4").disabled = true;
    document.getElementById("boleta4").disabled = true;
    document.getElementById("correo4").disabled = true;
    document.getElementById("telefono4").disabled = true;
    document.getElementById("tituloTT").disabled = true;
    document.getElementById("descripcionTT").disabled = true;

    document.getElementById("actualizar").style.display = 'none';
    document.getElementById("cancelar").style.display = 'none';
    document.getElementById("editar").style.display = '';
    document.getElementById("generar").style.display = '';
}