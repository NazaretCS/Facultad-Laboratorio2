<?php
    include('funciones.php');
    if (!empty($_POST['nombre']) && !empty($_POST['artista']) && !empty($_POST['precio'])) {
        include('funciones.php');
        
        var_dump($_POST);
        echo '<br>';
        $precio = $_POST['precio'];
        echo $precio;
        //$precioSuvifo = precioFinal($precio);
        

        guardar($_POST['nombre'],$_POST['artista'],$precioSuvifo);
        echo 'se guardo con exito todo';
    } else {
        echo '<main><article><p>Faltaron llenar algunos campos</p></article></main>';
        header ('refresh:5; url=cargar.php');
    }
?>