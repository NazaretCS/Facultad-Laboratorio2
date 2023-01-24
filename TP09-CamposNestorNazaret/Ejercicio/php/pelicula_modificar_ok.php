<?php
session_start();
if(!empty($_SESSION['usuario'])){
    $ruta = '../css';
    require('../html/encavezado.html');


    /*-------------------------------------   CODIGO DE LA ACTUALIZACION   -----------------------------------*/
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
    if (!empty($_POST['titulo']) && !empty($_POST['genero']) && !empty($_POST['fecha']) && !empty($_POST['id'])) {
        $titulo = $_POST['titulo'];
        require('conexion.php');
        $bd = 'peliculas';
        $conexion = conectar($bd);
        $id = $_POST['id'];
        $consulta2 = 'SELECT * FROM pelicula WHERE id= '.$id;
        //echo $consulta2;
        $q2 = mysqli_query($conexion, $consulta2);  //genero una consulta para poder sacar los dato de la pelicula correspondiente al id para asi eliminar la foto de portada de la carpeta portadas
        if ($q2){
            if (mysqli_num_rows($q2)) { // Este if me tomara como falso unicamente en el caso de que el numero de filas sea igual cero.
                //echo '<p>Trajo Algo</p>';
                $fila = mysqli_fetch_array($q2);
            
                /*-----------------------   Borrado de Imagen Reemplazada   -------------------*/  
                
                if (!empty($_FILES['foto']['size']) ) {        
                    $ubicacionArchivo = '../img/portadas/'.$fila['foto_portada'];
                    //echo  $ubicacionArchivo;
                    if (file_exists ($ubicacionArchivo)){
                        //echo '<p>El archivo si existe</p>';
                        if (unlink($ubicacionArchivo)){
                                //echo '<p>Eliminado Exitoso de la imagen</p>';
                        } else {
                            //echo '<p>Eliminado defectuoso de la imagen</p>';
                        }
                    } else {
                        //echo '<p>el archivo no existe</p>';
                    }

                        
                        $titulo = $_POST['titulo'];          
                        $arreglo_nmbre = explode('.', $_FILES['foto']['name']);
                        $extencion = $arreglo_nmbre[count($arreglo_nmbre) - 1];
                        $nombre_foto = $titulo .'.'.$extencion;    
                        $movida = move_uploaded_file($_FILES['foto']['tmp_name'], '../img/portadas/'.$nombre_foto );
                        if ($movida) {
                            //echo '<p> El archivo se movio con exito</p>';
                        } else {
                            //echo '<p> El archivo no se movio con exito</p>';
                        }


                        $consulta = 'UPDATE pelicula 
                                    SET foto_portada = \'' .$nombre_foto.'\'
                                    WHERE id ='.$id;
                        //echo $consulta;
                        $resultado2 = mysqli_query($conexion, $consulta);
                        
                        if ($resultado2) {
                            //echo '<p>Actualización Exitosa</p>';
                            //header ("refresh:3; url=pelicula_listado.php");
                        } else {
                            //echo '<p>Algo fallo en la actualización</p>';
                        }

                    /*--------------------------------------------------------------------------------*/ 
                    
                } else {
                    /*----------------- Cambiar el titulo reemplazado y el nombre de la portada ----------------*/
                    $titulo = $fila['titulo'];
                    if ($titulo != $_POST['titulo']) {
                        $titulo = $_POST['titulo'];
                        $arreglo_nmbre = explode('.', $fila['foto_portada']);

                        $extencion = $arreglo_nmbre[count($arreglo_nmbre) - 1];
                        $ubiVieja = '../img/portadas/'.$fila['foto_portada'];
                        //echo $ubiVieja;
                        $nombre_foto = $titulo .'.'.$extencion; 
                        $consulta = 'UPDATE pelicula 
                                    SET foto_portada = \'' .$nombre_foto.'\'
                                    WHERE id ='.$id;
                        //echo $consulta;
                        $resultado3 = mysqli_query($conexion, $consulta);
                        
                        if ($resultado3) {
                            //echo '<p>Actualización Exitosa de la foto con nombre nuevo</p></article></main>';
                            //header ("refresh:3; url=pelicula_listado.php");
                        } else {
                            //echo '<p>Algo fallo en la actualización e la foto con nombre nuevo</p>';
                        }
                        $ubiNueva = '../img/portadas/'.$nombre_foto;
                        //echo $ubiNueva;
                        $resl = rename($ubiVieja, $ubiNueva);  //La funcion rename renombra $ubiVieja a $ubiNueva, moviendolo de carpeta si fuera nesesario (pero no es el caso).
                        if ($resl) {
                            //echo '<p>se cambio elk nombre con exito</p>';
                        } else {
                            //echo '<p>fracaso rotundo</p>';
                        }
                    }

                    /*-------------------------------------------------------------------------------------*/ 
                }                 
            }
        }  

    


        if ($conexion) {
           
            $consulta = 'UPDATE pelicula 
                        SET titulo = \''.$titulo.'\',
                        duracion = \''.$_POST['duracion'].'\',
                        genero = \''. $_POST['genero'].'\',
                        fecha_estreno = \'' .$_POST['fecha'].'\'                        
                        WHERE id ='.$id;
            //echo $consulta;
            $resultado = mysqli_query($conexion, $consulta);
            
            if ($resultado) {
                echo '<p>Actualización Exitosa</p>';
                header ("refresh:3; url=pelicula_listado.php");
            } else {
                echo '<p>Algo fallo en la actualización</p>';
                header ("refresh:3; url=pelicula_listado.php");
            }                  
        } else {
            echo '<p>No se pudo modificar</p>';
            //header ("refresh:3; url=pelicula_listado.php");
        }
        desconectar($conexion);       

    } else {
        echo '<p>No se pudo modificar</p>';
        //header ("refresh:3; url=pelicula_listado.php");
    }
    
    /*----------------------------------------------------------------------------------------------------------*/ 
?>
            </article>
        </section>
    </main>
<?php
    require('../html/pie.html');
} else {
    header ('refresh:0; url=../index.html');
}
?>