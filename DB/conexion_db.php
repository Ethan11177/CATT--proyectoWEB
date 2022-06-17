<?php
    $conexion = mysqli_connect("localhost","root","","proyecto_web");
    $sql_alumno = "SELECT * FROM ALUMNO";
    $res = mysql_query($conexion, $sql_alumno);
    echo $res;
?>