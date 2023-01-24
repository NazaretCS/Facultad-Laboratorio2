<?php


    $ruta = '../css';
    require('../html/cabecera.html');
    require '../html/menu-secundario.html';
    //var_dump($_POST);;
    echo '<hr>';
        var_dump($_FILES);
    

    /*------------------------------     ------------------------------*/
?> 
    <main>
    <section class="seccion">
           
        <article>
<?php
   
    if (!empty($_POST['nro_maquina']) && !empty($_POST['horas_uso']) && !empty($_POST['recaudacion']) && !empty($_POST['fecha'])) {
        
        require ('funciones-conexion.php');
        $conexion = conectar();
        
        
        $nro_maquina = $_POST['nro_maquina'];
        $horas_uso = $_POST['horas_uso'];
        $recaudacion = $_POST['recaudacion'];
        $fecha = $_POST['fecha'];
        $nombre_foto = '';
        //var_dump($_FILES);
        if (!empty($_FILES['foto_pc']['size']) ) {
            
            $arreglo_nmbre = explode('.', $_FILES['foto_pc']['name']);
            $extencion = $arreglo_nmbre[count($arreglo_nmbre) - 1] ;
            
            $nombre_foto = $nro_maquina .'.'.$extencion;
            echo $nombre_foto;

            $movida = move_uploaded_file($_FILES['foto_pc']['tmp_name'], '../imagenes/'.$nombre_foto );
            if ($movida) {
                echo '<p> El archivo se movio con exito</p>';
            } else {
                echo '<p> El archivo no se movio con exito</p>';
            }
        }
        


        $consulta = 'INSERT INTO ciber (nro_maquina, fecha, horas_uso, recaudacion, foto_pc)
                    VALUES ('.$nro_maquina.', '.$fecha.', '.$horas_uso.', '.$recaudacion.', \''.$nombre_foto.'\')';
        echo $consulta;  //mostrar la consulta siempre ayuda a encontrar errores
        
        
        $q = mysqli_query($conexion, $consulta);
        if ($q){   // mysqli_query() me devolvera un booleano, por lo tanto me sera mas facil saber si la consulta fue exitosa o no.
            echo   '<p>Insercion Exitosa</p>';
            //header ('refresh:3; url=../index.php.php');
        } else {
            echo '<p>Error en la consultaaa</p>';
            //header ('refresh:3; url=pelicula_alta.php');
        }
        
        desconectar($conexion);    
     
    } else { 
        echo '<p>Faltaron llenar algunos campos</p>';
        //header ('refresh:4; url=pelicula_alta.php');
        
    }
    
?>
        </article>
    </section>
    </main>
<?php
    /*--------------------------------------------------------------------------------------------------------*/

 require('../html/pie.html'); 

?>