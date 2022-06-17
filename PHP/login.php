<?php    
    session_start();
    $conexion = mysqli_connect("localhost","root","","proyecto_web");
    $id = $_POST["id_ingreso"];
    $contrasena = $_POST["contrasena"];
    $sqlCheck_alumno = "SELECT * FROM alumno WHERE BOLETA = '$id' AND CONTRASENA = '$contrasena';";
    $sqlCheck_profesor = "SELECT * FROM profesor WHERE CORREO_ELECTRONICO = '$id' AND CONTRASENA = '$contrasena';";
    $res_alumno = mysqli_query($conexion, $sqlCheck_alumno);
    $res_profesor = mysqli_query($conexion, $sqlCheck_profesor);
    $respAX["cod"] = 0;
    $respAX["msj"] = "Error";
    $respAX["url"] = "";
    if (mysqli_num_rows($res_alumno) == 1){
        $respAX["cod"] = 1; 
        $respAX["msj"] = "¡Sea bienvenido!";
        $respAX["url"] = "inicioAlumnos.php";
        $_SESSION["id"] = $id;
    }else if(mysqli_num_rows($res_profesor) == 1){
        $respAX["cod"] = 2; 
        $respAX["msj"] = "¡Sea bienvenido!";
        $respAX["url"] = "profesor.html";
        $_SESSION["id"] = $id;
    }else if($id == "adminescom" && $contrasena == "root") {
        $respAX["cod"] = 3; 
        $respAX["msj"] = "Oh dios mio es el jefe";
        $respAX["url"] = "./PHP/index_administrador.php";
        $_SESSION["id"] = "admin";
    }    
    echo json_encode($respAX);
?>