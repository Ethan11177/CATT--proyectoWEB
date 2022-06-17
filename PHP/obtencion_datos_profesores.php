<?php
    session_start();

    

    if(!isset($_SESSION["id"])){
        header("location: ./../index.html");
    }
    else {

        $respAX = [];
        $i = 0;
        $conexion = mysqli_connect("localhost","root","","proyecto_web");

        $sqlProf = "SELECT * FROM profesor;";

        if ($resProf = mysqli_query($conexion, $sqlProf)) {
            
            $respAX["num"] = mysqli_num_rows($resProf);

            while ($respAX["db"][$i] = mysqli_fetch_row($resProf)) {
                $i++;
            }

        }
        echo json_encode($respAX);
    }

?>