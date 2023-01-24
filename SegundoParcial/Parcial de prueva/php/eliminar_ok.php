<?php 
    session_start();
    if (!empty($_SESSION['usuario']) && isset($_SESSION['usuario'])){

    require '../html/cabecera.html';
    require '../html/menu.html';

    require 'funciones-conexion.php';
    $conexion = conectar();//funciones-conexion modificado(no requiere validacion)
    if (!empty($_GET['id'])){
        $id = $_GET['id'];
        $consulta = 'DELETE FROM covid WHERE id=\''. $id .'\'';
        $ejecutar = mysqli_query($conexion, $consulta);
        if ($ejecutar) {
            echo '<p>Usuario eliminado</p>';
            header('refresh:3;url=../listar-covid.php');
        } else {
            echo '<p>El usuario no pudo ser eliminado</p>';
            header('refresh:3;url=../listar-covid.php');
        }
    }
}
?>