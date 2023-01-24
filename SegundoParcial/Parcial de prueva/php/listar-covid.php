<?php
    session_start();

if (!empty($_SESSION['usuario']) && isset($_SESSION['usuario'])){

    require '../html/cabecera.html';
    require '../html/menu.html';

    require 'funciones-conexion.php';

    $conexion = conectar();//funciones-conexion modificado(no requiere validacion)
    $consulta ='SELECT * FROM covid';
    $ejecutar = mysqli_query($conexion, $consulta);
    $numFilas = mysqli_num_rows($ejecutar);
    if($numFilas>0){
        echo '<table>';
            echo '<thead>';
                echo '<tr>';
                    echo '<th scope="col">Nombre</th>';
                    echo '<th scope="col">Teléfono</th>';
                    echo '<th scope="col">Dirección</th>';
                    echo '<th scope="col">Fecha de hisopado</th>';
                    echo '<th scope="col">Foto</th>';
                    echo '<th scope="col">Modificar</th>';
                    echo '<th scope="col">Eliminar</th>';
                echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
                while ($linea = mysqli_fetch_array($ejecutar)) {
                    $foto = '../fotos/'. $linea['foto'];
                    echo '<tr>';
                        echo '<td>'. $linea['nombre_paciente'] .'</td>';
                        echo '<td>'. $linea['telefono'] .'</td>';
                        echo '<td>'. $linea['direccion'] .'</td>';
                        echo '<td>'. $linea['fecha_hisopado'] .'</td>';
                        echo '<td><img src="'. $foto .'"></td>';
                        echo '<td><a href="modificar.php?id='. $linea['id'] .'">
                            <img src="../img/edit_pencil.png" id="minis"></a></td>';
                        echo '<td><a href="eliminar.php?id='. $linea['id'] .'">
                            <img src="../img/trash_empty.png" id="minis"></a></td>';
                        echo '</tr>';
                }
            echo '</tbody>';
        echo '<table>';
        } else {
                echo '<p>No existen usuarios en la base de datos</p>';
        }
        desconectar($conexion);

    require '../html/pie.html';
} else {
    echo '<p>No se encuentra logeado</p>';
}
?>