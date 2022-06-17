<?php
    
    session_start();

    if (!isset($_SESSION["correo"])) {
        header("location:./../login.html")
    }

    $conexion = mysqli_connect("localhost","root","","proyecto_web");

    $id = $_POST["id_ingreso"];
    $contrasena = $_POST["contrasena"];

    $sqlCheck_alumno = "SELECT * FROM alumno WHERE BOLETA = '$id' AND CONTRASENA = '$contrasena';";
    $res_alumno = mysqli_query($conexion,$sqlCheck_alumno);

    $sqlCheck_profesor = "SELECT * FROM profesor WHERE CORREO_ELECTRONICO = '$id' AND CONTRASENA = '$contrasena';";
    $res_profesor = mysqli_query($conexion,$sqlCheck_profesor);

    if (mysqli_num_rows($res_alumno) == 1) {   
        $respAX["cod"] = 1; 
        $respAX["msj"] = "todo bien es un alumno";
        $_SESSION["correo"] = $id;
    }
    if(mysqli_num_rows($res_profesor) == 1) {
        echo "2","todo bien es un profesor";
        $_SESSION["correo"] = $id;
    }
    if($id == "adminescom" && $contrasena == "qwerty") {
        echo "3","oh dios mio es el jefe";
        $_SESSION["correo"] = "admin";
    }
    if($id == "" && $contrasena == "") {
        echo "Error ningun registro encontrado";
    }
    
?>