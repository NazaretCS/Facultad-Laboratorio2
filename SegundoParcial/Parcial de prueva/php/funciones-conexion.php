<?php
    session_start();

if (!empty($_SESSION['usuario']) && isset($_SESSION['usuario'])){

function conectar(){
    $servidor = 'localhost'; // modificar segun corresponda la configuracion local de su MySQL
    $usuario = 'root';
    $clave = '';
    $db = 'bpar';
    $conexion = mysqli_connect($servidor, $usuario, $clave, $db);
    
    if (!$conexion) {
        echo '<p>Error, no se ha podido conectar con el servidor</p>';
    } else {
        return($conexion);
    }
}

function desconectar($conexion){
    if ($conexion) {
        $desconexion = mysqli_close($conexion);
        if (!$desconexion) {
            return 'Error al intentar desconectar';
        } 
    } else {
        return 'No se pudo desconectar, no existe la conexion';
    }
    return true;
}
}
?>