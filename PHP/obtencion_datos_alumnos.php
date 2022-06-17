<?php
    session_start();

    

    if(!isset($_SESSION["id"])){
        header("location: ./../index.html");
    }
    else {

        $respAX = [];
        $i = 0;
        $conexion = mysqli_connect("localhost","root","","proyecto_web");

        $sqlAlu = "SELECT * FROM alumno;";

        if ($resAlu = mysqli_query($conexion, $sqlAlu)) {
            
            $respAX["num"] = mysqli_num_rows($resAlu);

            while ($respAX["db"][$i] = mysqli_fetch_row($resAlu)) {
                $i++;
            }

        }
        echo json_encode($respAX);
    }

?>