<?php
    $valor = $_POST['numero'];
    $nombre = 'ciber';
    $tiempo = time() + 60 * 24 *60 *60;
    if(!empty($_COOKIE['ciber']) && isset($_COOKIE['ciber'])){
        
        setcookie($nombre, $valor, $tiempo, '/');
        //echo $_COOKIE[$_SESSION['usuario']];
        header('refresh:0; url=mostrar-cookie.php');
        
    } else {
        setcookie($nombre, $valor, $tiempo, '/');
        header('refresh:0; url=mostrar-cookie.php');
        //echo 'creada sin exito';
    }
    
    
?>