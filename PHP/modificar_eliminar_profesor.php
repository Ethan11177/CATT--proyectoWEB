<?php

    session_start();

    if (!isset($_SESSION["id"])) {
        header("location: ./../index.html");
    }
    else {
        
        $nombre = $_POST["nombre"];
        $ape_p = $_POST["ape_p"];
        $ape_m = $_POST["ape_m"];
        $correo = $_POST["correo"];
        $numero = $_POST["numero"];
        $opcion = $_POST["opcion"];
        $contasena = $_POST["contrasena"];

        $respAX = [];

        $conexion = mysqli_connect("localhost","root","","proyecto_web");

        if (correo != "" && $nombre == "" || $ape_p == "" || $ape_m == "" || $correo == "" || $numero == "" || $opcion == "") {
            
            if ($opcion == "E") {

                $sqlGet = "SELECT * FROM profesor WHERE CORREO_ELECTRONICO = '$correo'";
                
                if ($resGet = mysqli_query($conexion, $sqlGet)) {

                    $sqlEli = "DELETE FROM profesor WHERE CORREO_ELECTRONICO = '$correo'";

                    if (mysqli_query($conexion, $sqlEli) == TRUE) {
                        $respAX["cod"] = 1;
                        $respAX["msj"] = "Se elimino el usuario: ".$correo;
                        $respAX["url"] = "";
                    }else {
                        $respAX["cod"] = 0;
                        $respAX["msj"] = "No se pudo eliminar: ".$correo;
                        $respAX["url"] = "";
                    }

                }else {
                    $respAX["cod"] = 0;
                    $respAX["msj"] = "Error sin registro de: ".$correo;
                    $respAX["url"] = "";
                }
            }
            
        }else {
            
            
            if ($nombre == "" || $ape_p == "" || $ape_m == "" || $numero == "" || $opcion == "") {
                $respAX["cod"] = 0;
                $respAX["msj"] = "Error llene todos los datos";
            }
            else {

                if ($opcion == "M") {

                    $sqlGet = "SELECT * FROM profesor WHERE CORREO_ELECTRONICO = '$correo'";
                    
                    if ($resGet = mysqli_query($conexion, $sqlGet)) {

                        $sqlMod = "UPDATE profesor SET NOMBRE = '$nombre', APELLIDO_PA = '$ape_p', APELLIDO_MA = '$ape_m', TELEFONO = '$numero', CONTRASENA = '$contasena' WHERE CORREO_ELECTRONICO = '$correo'";

                        if (mysqli_query($conexion, $sqlMod) == TRUE) {
                            $respAX["cod"] = 1;
                            $respAX["msj"] = "Se modifico el usuario: ".$correo;
                            $respAX["url"] = "";
                        }else {
                            $respAX["cod"] = 0;
                            $respAX["msj"] = "No se pudo modificar: ".$correo;
                            $respAX["url"] = "";
                        }

                    }else {
                        $respAX["cod"] = 0;
                        $respAX["msj"] = "Error sin registro de: ".$correo;
                        $respAX["url"] = "";
                    }
                }
            }
        }
        
        echo json_encode($respAX);
    }
?>