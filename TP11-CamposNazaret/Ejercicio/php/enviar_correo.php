<?php
    session_start();  // 
    if (!empty($_SESSION['usuario'])) {
        //echo  $_SESSION['mail'];
        if (!empty($_POST['motivo']) && !empty($_POST['mensaje'])) {
            $usuario = $_SESSION['usuario'];
            $motivo = $_POST['motivo'];
            $mensaje = $_POST['mensaje'];
            $correoDestino = 'nazaretcampos247@gmail.com'; 
            $correoOrigen =  $_SESSION['mail'];
            $asunto = $motivo.' - '. $usuario;
            $cabecera = 'From:' . $correoOrigen . "\r\n" . 'Reply-To:' .$correoOrigen;
            $resultado = mail($correoDestino, $asunto, $mensaje, $cabecera);
            if ($resultado) {
                echo '<p>Se hizo bien</p>';
            } else {
                echo '<p>Se hizo Mal</p>';
                echo $usuario;
                echo '<br>'; 
                echo $motivo;
                echo '<br>';
                echo $mensaje;
                echo '<br>';
                echo $correoDestino;
                echo '<br>';
                echo $correoOrigen;
                echo '<br>';
                echo $asunto;
                echo '<br>';
                echo $cabecera;
            }
            echo '<p>nazaret</p>';
        } else {
            echo '<p>Algo salio mal parte mil</p>';
        }
    } else {
        header ('refresh:0; url=../index.html');
    }
?>