<?php
    session_start();
    $id = $_GET['id'];
    $usuario = $_SESSION['usuario'];
    $tiempo = time() + 60 * 24 *60 *60;
    if(!empty($_COOKIE[$_SESSION['usuario']]) && isset($_COOKIE[$_SESSION['usuario']])){
        
        setcookie($usuario, $_COOKIE[$_SESSION['usuario']] .','.$id, $tiempo, '/');
        //echo $_COOKIE[$_SESSION['usuario']];
        header('refresh:0; url=pelicula_listado.php');
        
    } else {
        setcookie($usuario, $id, $tiempo, '/');
        header('refresh:0; url=pelicula_listado.php');
        //echo 'creada sin exito';
    }
    
    
?>