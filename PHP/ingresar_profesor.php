<?php
        
    $conexion = mysqli_connect("localhost","root","","proyecto_web");

    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    $nombre = $_POST["nombre"];
    $ape_pa = $_POST["ape_pa"];
    $ape_ma = $_POST["ape_ma"];
    $tel = $_POST["tel"];

    if ($correo != "" && $contrasena != "" && $nombre != "" && $ape_pa != "" && $ape_ma != "" && $tel != "") {

    
        $respAx["cod"] = 0;
        $respAx["msj"] = "Error";
        $respAx["url"] = "";

        $sqlCheck = "SELECT * FROM profesor WHERE CORREO_ELECTRONICO = '$correo';";
        $res = mysqli_query($conexion,$sqlCheck);

        if (mysqli_num_rows($res) == 0) {
            
            $sqlReady = "INSERT INTO profesor(`CORREO_ELECTRONICO`,`CONTRASENA`,`NOMBRE`,`APELLIDO_PA`,`APELLIDO_MA`,`TELEFONO`) VALUES('$correo','$contrasena','$nombre','$ape_pa','$ape_ma','$tel');";

            $res = mysqli_query($conexion, $sqlReady);
            
            $respAx["cod"] = 1;
            $respAx["msj"] = "Todos los datos insertados de manera correcta";
            $respAx["url"] = "";

        }else {
            $respAx["cod"] = 0;
            $respAx["msj"] = "Error al insertar los datos dentro de la base de datos. Puede que ya este un regitro igual en la base de datos";
            $respAx["url"] = "";
        }
    }
    else {
        $respAx["cod"] = 0;
        $respAx["msj"] = "Error. Llene todos los campos";
        $respAx["url"] = "";
    }

    echo json_encode($respAx);

?>