function mostramosFormAlumnos(){
    document.getElementById('registroA').style.display = '';
    document.getElementById('registroD').style.display = 'none';
}
function mostramosFormDirectores(){
    document.getElementById('registroA').style.display = 'none';
    document.getElementById('registroD').style.display = '';
    document.getElementById('contenedor').style.margin = "51px auto";
}
function habilitarAlumnos(){
    let valor = document.getElementById('numeroIntegrantes');
    if(valor.value == 0){
        alert("Por favor seleccione el numero de alumnos.");
    }else if(valor.value == 1){
        document.getElementById('f1').style.display = '';
        document.getElementById('f2').style.display = 'none';
        document.getElementById('f3').style.display = 'none';
        document.getElementById('f4').style.display = 'none';
    }else if(valor.value == 2){
        document.getElementById('f1').style.display = '';
        document.getElementById('f2').style.display = '';
        document.getElementById('f3').style.display = 'none';
        document.getElementById('f4').style.display = 'none';
    }else if(valor.value == 3){
        document.getElementById('f1').style.display = '';
        document.getElementById('f2').style.display = '';
        document.getElementById('f3').style.display = '';
        document.getElementById('f4').style.display = 'none';
    }else{
        document.getElementById('f1').style.display = '';
        document.getElementById('f2').style.display = '';
        document.getElementById('f3').style.display = '';
        document.getElementById('f4').style.display = '';
    }
}