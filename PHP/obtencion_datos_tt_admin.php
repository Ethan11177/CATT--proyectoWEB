<?php

    session_start();

    if (!isset($_SESSION["id"])) {
        header("location: ./../index.html");
    }else {
        
        $conexion = mysqli_connect("localhost","root","","proyecto_web");

        $respAX = [];
        $i = 0;
        $resTT = [];

        $sqlTT = "SELECT * FROM trabajo_terminal";

        if ($resTT = mysqli_query($conexion, $sqlTT)) {

            $respAX["num"] = mysqli_num_rows($resTT);

            while ($respAX["db"][$i] = mysqli_fetch_row($resTT)) {
                $i++;
            }

            echo json_encode($respAX);
        }
    }

?>