<?php
    session_start();
    $ruta = '../css';
    require('../html/encavezado.html');
    if (!empty($_SESSION['usuario'])) {
        echo '<main><article><p>Está Cerrando la sesión</p><article/><main/>';
        session_destroy();
        /*$usuario = $_SESSION['usuario'];
        unset($_COOKIE[$usuario]); 
        setcookie($usuario, '', time() - 3600, '/');*/  // a estas lineas las cree para verificar un probla que tenia con las cookies, queria ver que pasaba si las creaba nuevamente.


        header('refresh:3; ../index.html');
    } else {
        echo '<main><article><p>No Se Inició Sesión</p><article/><main/>';
        header('refresh:5; ../index.html');
    }
    require('../html/pie.html');
?>