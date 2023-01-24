<?php
session_start();
if (!empty($_SESSION['usuario'])) {
    $ruta = '../css';
    require('../html/encavezado.html');
    

    /*------------------------------    INSERTAR PELICULAS EN LA BASE DE DATOS   ------------------------------*/
?> 
    <main>
    <section class="seccion">
            <article>
                <?php
                    require('menu.php');                   
                ?>
                
            </article>
        <article>
<?php
   
    if (!empty($_POST['titulo']) && !empty($_POST['genero']) && !empty($_POST['fecha'])) {
        
        
        require ('conexion.php');
        $bd = 'peliculas';
        $conexion = conectar($bd);

        $titulo = $_POST['titulo'];
        $duracion = $_POST['duracion'];
        $genero = $_POST['genero'];
        $fecha = $_POST['fecha'];
        $nombre_foto = '';
        //var_dump($_FILES);
        if (!empty($_FILES['foto']['size']) ) {
            
            $arreglo_nmbre = explode('.', $_FILES['foto']['name']);
            $extencion = $arreglo_nmbre[count($arreglo_nmbre) - 1] ;
            $nombre_foto = $titulo .'.'.$extencion;

            $movida = move_uploaded_file($_FILES['foto']['tmp_name'], '../img/portadas/'.$nombre_foto );
            if ($movida) {
                //echo '<p> El archivo se movio con exito</p>';
            } else {
                //echo '<p> El archivo no se movio con exito</p>';
            }
        }
        


        $consulta = 'INSERT INTO pelicula (titulo, duracion, genero, fecha_estreno, foto_portada)
                    VALUES (\''.$titulo.'\', '.$duracion.', \''.$genero.'\', \''.$fecha.'\', \''.$nombre_foto.'\')';
        //echo $consulta;  //mostrar la consulta siempre ayuda a encontrar errores
        
        
        $q = mysqli_query($conexion, $consulta);
        if ($q){   // mysqli_query() me devolvera un booleano, por lo tanto me sera mas facil saber si la consulta fue exitosa o no.
            echo   '<p>Insercion Exitosa</p>';
            header ('refresh:3; url=pelicula_alta.php');
        } else {
            echo '<p>Error en la consulta</p>';
            header ('refresh:3; url=pelicula_alta.php');
        }
        
        desconectar($conexion);    
     
    } else { 
        echo '<p>Faltaron llenar algunos campos</p>';
        header ('refresh:4; url=pelicula_alta.php');
        
    }
    
?>
        </article>
    </section>
    </main>
<?php
    /*--------------------------------------------------------------------------------------------------------*/

 require('../html/pie.html'); 
} else {
    header ('refresh:0; url=../index.html');
}
?>