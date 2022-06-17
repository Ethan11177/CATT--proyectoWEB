<?php
    session_start();

    if (!isset($_SESSION["id"])) {
        header("location: ./../index.html");
    }else {
        
    
        $conexion = mysqli_connect("localhost","root","","proyecto_web");

        $identificador = $_SESSION["id"];
        $boleta = $_POST["boleta"];
        $clave = $_POST["clave"];

        $respAX = [];

        if($boleta != NULL && $clave != NULL){

            $sqlClave = "SELECT * FROM alumno WHERE ID_TT = (SELECT ID_TT from `alumno` WHERE BOLETA = $identificador) AND CONTRASENA = '$clave';";
            $res1 = mysqli_query($conexion, $sqlClave);

            if(mysqli_num_rows($res1) == 1){
                if($identificador != $boleta){

                    $sqlUsuario = "SELECT * FROM alumno WHERE ID_TT = (SELECT ID_TT from `alumno` WHERE BOLETA = $identificador) AND BOLETA = $boleta;";
                    $res2 = mysqli_query($conexion, $sqlUsuario);

                    if(mysqli_num_rows($res2) == 1){

                        $eliminamos = "DELETE FROM `alumno` WHERE BOLETA = $boleta;";
                        mysqli_query($conexion, $eliminamos);
                        
                        $respAX["cod"] = 1;
                        $respAX["msj"] = "Todo borrado con exito";
                        $respAX["url"] = "";

                    }else{
                        $respAX["cod"] = 0;
                        $respAX["msj"] = "Error. No esta el registro";
                        $respAX["url"] = "";
                    }
                }else{
                    $respAX["cod"] = 0;
                    $respAX["msj"] = "No se puede eliminar este Registro";
                    $respAX["url"] = "";
                }
            }else{
                $respAX["cod"] = 0;
                $respAX["msj"] = "La contra no es correcta";
                $respAX["url"] = "";
            }
        }else{
            $respAX["cod"] = 0;
            $respAX["msj"] = "Error llene todos los datos";
            $respAX["url"] = "";
        }
        mysqli_close($conexion);

        echo json_encode($respAX);
    }
?>