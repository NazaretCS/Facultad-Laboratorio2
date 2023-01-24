<?php
    function conectar($bd)  // le paso el parametro $bd para que no tenga que estar entrando y cambiando el nombre de la base desde el archivo de funciones, sino que lo aria directamente antes de llamarla.
    {
        $servidor = 'localhost';
        $usuario = 'root';
        $calve = '';
        $base = $bd;  
        $conexion = mysqli_connect($servidor, $usuario, $calve, $base);
        if (!$conexion){
            echo '<p> No se pudo Conectar con la base de datos espesificada</p>';
        } else {
            //echo '<p> Conexcion Exitosa </p>';
            return $conexion;
        }
    }
    
    function desconectar($conexion)
    {
        if($conexion) {
            mysqli_close($conexion);
            //echo '<p>Desconexion exitosa</p>';
        } else {
            echo '<p>No habia una conexión con ese nombre </p>';
        }
    }

?>