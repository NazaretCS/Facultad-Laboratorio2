<?php 
    require_once ('php/conexion.php');
    $ruta = 'css';
    require_once('html/encavezado.html');
    ?>
    <main>
        <article>
           <?php
                $bd = 'peliculas';  // base de datos de prueva para saber si la conexion se realizaba con exito o no.
                $conexion = conectar($bd);

                desconectar($conexion);
           ?>  
        </article>
    </main>
    <?php
    require_once('html/pie.html');
?>