<?php
    $servidor_db='localhost';
    $user_db='root';
    $passw_db='';
    $base_db='blog_master';

    $coneccion = mysqli_connect($servidor_db,$user_db,$passw_db);
    mysqli_select_db($coneccion,$base_db);
    if (mysqli_connect_errno()) {
        echo 'error al conectar a la base de datos (host)';
    }
    mysqli_query($coneccion,'utf-8');

    session_start();
?>