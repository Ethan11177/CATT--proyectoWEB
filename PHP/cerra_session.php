<?php

    session_start();

    if (!isset($_SESSION["id"])) {
        header("location: ./../index.html");
    }
    else{

        session_destroy();
        header("location: ./../index.html");
    }

?>