<?php

    session_start();

    if (!isset($_SESSION["id"])) {
        header("location: ./../index.html");
    }
    else {

        $conexion = mysqli_connect("localhost","root","","proyecto_web");
        
        $boleta = $_POST["boleta"];
        $nombre = $_POST["nombre"];
        $ape_p = $_POST["ape_p"];
        $ape_m = $_POST["ape_m"];
        $correo = $_POST["correo"];
        $numero = $_POST["numero"];
        $opcion = $_POST["opcion"];

        $respAX = [];

            if ($boleta != "" && $nombre == "" || $ape_p == "" || $ape_m == ""  || $numero == "" || $opcion == "") {
                
                if ($opcion == "E") {

                    $sqlGet = "SELECT * FROM alumno WHERE BOLETA = '$boleta'";
                    
                    if ($resGet = mysqli_query($conexion, $sqlGet)) {

                        $sqlEli = "DELETE FROM alumno WHERE BOLETA = '$boleta'";

                        if (mysqli_query($conexion, $sqlEli) == TRUE) {
                            $respAX["cod"] = 1;
                            $respAX["msj"] = "Se elimino el usuario: ".$boleta ;
                            $respAX["url"] = "";
                        }else {
                            $respAX["cod"] = 0;
                            $respAX["msj"] = "No se pudo eliminar: ".$boleta;
                            $respAX["url"] = "";
                        }

                    }else {
                        $respAX["cod"] = 0;
                        $respAX["msj"] = "Error sin registro de: ".$correo;
                        $respAX["url"] = "";
                    }
                }
            }else {
            
                if ($boleta == "" || $nombre == "" || $ape_p == "" || $ape_m == ""  || $numero == "" || $opcion == "") {
                    $respAX["cod"] = 0;
                    $respAX["msj"] = "Error llene todos los datos";
                }
                else {

                    if ($opcion == "M") {

                        $sqlGet = "SELECT * FROM alumno WHERE BOLETA = '$boleta'";
                        
                        if ($resGet = mysqli_query($conexion, $sqlGet)) {

                            if ($correo == "") {
                                $sqlMod = "UPDATE alumno SET NOMBRE = '$nombre', APELLIDO_PA = '$ape_p', APELLIDO_MA = '$ape_m', TELEFONO = '$numero' WHERE BOLETA = '$boleta'";
                            }else {
                                $sqlMod = "UPDATE alumno SET NOMBRE = '$nombre', APELLIDO_PA = '$ape_p', APELLIDO_MA = '$ape_m', TELEFONO = '$numero', CORREO_ELECTRONICO = '$correo' WHERE BOLETA = '$boleta'";
                            }

                            

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