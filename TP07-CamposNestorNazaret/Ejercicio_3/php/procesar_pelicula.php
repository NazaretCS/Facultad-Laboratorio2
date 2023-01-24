<?php
    $ruta = '../css';
    require('../html/encavezado.html');
    
?> 
    <main>
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
            header ('refresh:5; url=pelicula_alta.php');
        } else {
            echo '<p>Error en la consulta</p>';
        }
        
        desconectar($conexion);    
     
    } else { 
        echo '<p>Faltaron llenar algunos campos</p>';
        header ('refresh:5; url=pelicula_alta.php');
        
    }
    
?>
        </article>
    </main>
<?php
    

 require('../html/pie.html'); 
?>