<?php

function conectar(){
    $servidor = 'localhost'; // modificar segun corresponda la configuracion local de su MySQL
    $usuario = 'root';
    $clave = '';
    $db = 'backup parcial';
    $conexion = mysqli_connect($servidor, $usuario, $clave, $db);
    return $conexion;
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

?>