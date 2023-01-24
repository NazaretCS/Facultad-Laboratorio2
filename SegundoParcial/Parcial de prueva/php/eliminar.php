<?php
    session_start();
    if (!empty($_SESSION['usuario']) && isset($_SESSION['usuario'])){

    require '../html/cabecera.html';
    require '../html/menu.html';

    require 'funciones-conexion.php';
    $conexion = conectar();//funciones-conexion modificado(no requiere validacion)
    if (!empty($_GET['id'])){
        $id = $_GET['id'];
        $consulta = 'SELECT nombre_paciente FROM covid WHERE id= \''.$id.'\'';
        $ejecutar = mysqli_query($conexion, $consulta);

        if(mysqli_num_rows($ejecutar)>0) {
            $linea = mysqli_fetch_array($ejecutar);
            echo '<p>Quieres eliminar a <b>'. $linea['nombre_paciente'] .'<b>?</p>';
            echo '<ul>';
            echo '<li><a href="eliminar_ok.php?id='. $id.'">Aceptar</a></li>';
            echo '<li><a href="eliminar_ok.php">Cancelar</a></li>';
            echo '</ul>';
        }

        desconectar($conexion);
    } else {
        echo '<p>No se obtuvo un usuario</p>';
    }
}
?>