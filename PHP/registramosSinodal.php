<?php
    session_start();

    if (!isset($_SESSION["id"])) {
        header("location: ./../index.html");
    }else {
        
        $conexion = mysqli_connect("localhost", "root", "", "proyecto_web");
        $identificar = $_SESSION["id"];
        $correo = $_POST["correo"];
        $cargo = "Sinodal";

        if ($correo == "") {
            $respAX["cod"] = 0;
            $respAX["msj"] = "Error llene todos los datos";
            $respAX["url"] = "";
        }else {

            $sqlchecamosCantidadEquipo = "SELECT COUNT(*) FROM directores_sinodales WHERE ID_TT1 = (SELECT ID_TT from `alumno` WHERE BOLETA = $identificar);";

            $res = mysqli_query($conexion, $sqlchecamosCantidadEquipo);
            $capturoNumero = mysqli_fetch_row($res);
            $cantidad = $capturoNumero[0];

            if($cantidad <= 3){

                $sqlchecamosRegistro = "SELECT CORREO_ELECTRONICO1 FROM directores_sinodales WHERE CORREO_ELECTRONICO1 = '$correo';";
                $res2 = mysqli_query($conexion, $sqlchecamosRegistro);

                if(mysqli_num_rows($res2) == 0){

                    $queryID_TT = "SELECT ID_TT from `alumno` WHERE BOLETA = $identificar;";
                    $res3 = mysqli_query($conexion, $queryID_TT);
                    $capturoID = mysqli_fetch_row($res3);
                    $idTT = $capturoID[0];

                    $sqlInsertamos = "INSERT INTO `directores_sinodales`(`ID_TT1`, `CORREO_ELECTRONICO1`, `CARGO`) VALUES ('$idTT','$correo','$cargo')";
                    mysqli_query($conexion, $sqlInsertamos);

                    $respAX["cod"] = 1;
                    $respAX["msj"] = "Datos ingresados correctamente";
                    $respAX["url"] = "./../inicioAlumnos.php";

                }else{
                    $respAX["cod"] = 0;
                    $respAX["msj"] = "Director ya registrado";
                    $respAX["url"] = "";
                }
            }else{
                $respAX["cod"] = 0;
                $respAX["msj"] = "No se puede tener mas de 1 director";
                $respAX["url"] = "";
            }
        }
        
        echo json_encode($respAX);

    }
?>