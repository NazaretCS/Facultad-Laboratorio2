<?php
    require '../html/cabecera.html';
    require '../html/menu.html';
    
    if (!empty($_POST['usuario']) && !empty($_POST['pass'])){
        $usuarioIngreso = $_POST['usuario'];
        $telefono = $_POST['telefono'];
        require 'funciones-conexion.php';

        $conexion = conectar();
        $consulta ='SELECT id, nombre_paciente, telefono FROM covid 
                    WHERE nombre_paciente = \''.$usuarioIngreso.'\' AND telefono = \''.$telefono.'\'';
        $ejecutar = mysqli_query($conexion, $consulta);
        $numFilas = mysqli_num_rows($ejecutar);
        if ($numFilas > 0) {
            $datos = mysqli_fetch_array($ejecutar);
            echo '<p>Usuario y contraseña ingresados correctos</p>';
            $_SESSION['usuario'] = $datos['nombre_paciente'];
            $_SESSION['id'] = $datos['id'];
            header('location:listar-covid.php');
        } else {
            echo '<p>Usuario o contraseña ingresados incorrectos</p>';
        }
        desconectar($conexion);

    } else {
        echo '<p>Debes ingresar un usuario y contraseña</p>';
    }
?>