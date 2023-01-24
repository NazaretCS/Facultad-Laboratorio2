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
    if (!empty($_POST['usuario']) && !empty($_POST['clave']) && !empty($_POST['mail']) &&  !empty($_POST['fecha']) && !empty($_POST['id'])) {
        $titulo = $_POST['usuario'];
        require('conexion.php');
        $bd = 'peliculas';
        $conexion = conectar($bd);
        $id = $_POST['id'];
        $consulta2 = 'SELECT * FROM usuario WHERE id= '.$id;
        //echo $consulta2;
        // echo '<p>Conlta dos</p>'; 
        // echo '<br>';
        $q2 = mysqli_query($conexion, $consulta2);  //genero una consulta para poder sacar los dato de la pelicula correspondiente al id para asi eliminar la foto de portada de la carpeta portadas
        if ($q2){
            if (mysqli_num_rows($q2)) { // Este if me tomara como falso unicamente en el caso de que el numero de filas sea igual cero.
                //echo '<p>Trajo Algo</p>';
                
                //echo '<br>';
                $fila = mysqli_fetch_array($q2);
            
                /*-----------------------   Borrado de Imagen Reemplazada   -------------------*/  
                
                if (!empty($_FILES['foto']['size']) ) { 
                    if($fila['foto'] != '')  {     
                        $ubicacionArchivo = '../img/usuarios/'.$fila['foto'];
                        //echo  $ubicacionArchivo;
                        
                        //echo '<br>';
                        if (file_exists ($ubicacionArchivo)){
                            // echo '<p>El archivo si existe</p>';
                            // echo $ubicacionArchivo;
                            // echo '<br>';
                            // var_dump($fila);
                            // echo '<br>';
                            if (unlink($ubicacionArchivo)){
                                    //echo '<p>Eliminado Exitoso de la imagen</p>';
                                    
                                    //echo '<br>';
                            } else {
                                //echo '<p>Eliminado defectuoso de la imagen</p>';
                                
                                //echo '<br>';
                            }
                        } else {
                            //echo '<p>el archivo no existe</p>';
                            //echo '<br>';
                        }
                    }

                        
                        $titulo = $_POST['usuario'];          
                        $arreglo_nmbre = explode('.', $_FILES['foto']['name']);
                        $extencion = $arreglo_nmbre[count($arreglo_nmbre) - 1];
                        $nombre_foto = $titulo .'.'.$extencion;    
                        $movida = move_uploaded_file($_FILES['foto']['tmp_name'], '../img/usuarios/'.$nombre_foto );
                        if ($movida) {
                            //echo '<p> El archivo se movio con exito</p>';
                            //echo '<br>';
                        } else {
                            //echo '<p> El archivo no se movio con exito</p>';
                            //echo '<br>';
                        }


                        $consulta = 'UPDATE usuario 
                                    SET foto = \'' .$nombre_foto.'\'
                                    WHERE id ='.$id;
                        // echo $consulta;
                        // echo '<p>Consulta 2</p>';
                        // echo '<br>';
                        $resultado2 = mysqli_query($conexion, $consulta);
                        
                        if ($resultado2) {
                            //echo '<p>Actualización Exitosa</p>';
                            //echo '<br>';
                            header ("refresh:3; url=usuario_listado.php");
                        } else {
                            echo '<p>Algo fallo en la actualización</p>';
                            //echo '<br>';
                        }

                    /*--------------------------------------------------------------------------------*/ 
                    
                } else {
                    /*----------------- Cambiar el titulo reemplazado y el nombre de la portada ----------------*/
                    $titulo = $fila['usuario'];
                    if ($titulo != $_POST['usuario']) {
                        $titulo = $_POST['usuario'];
                        $arreglo_nmbre = explode('.', $fila['foto']);

                        $extencion = $arreglo_nmbre[count($arreglo_nmbre) - 1];
                        $ubiVieja = '../img/usuarios/'.$fila['foto'];
                        //echo $ubiVieja;
                        //echo    '<p>Uvicacion Vieja</p>';
                        //echo '<br>';
                        $nombre_foto = $titulo .'.'.$extencion; 
                        $consulta = 'UPDATE usuario 
                                    SET foto = \'' .$nombre_foto.'\'
                                    WHERE id ='.$id;
                        // echo $consulta;
                        // echo    '<p>Consulta 3 maomenos</p>';
                        //echo '<br>';
                        $resultado3 = mysqli_query($conexion, $consulta);
                        
                        if ($resultado3) {
                            //echo '<p>Actualización Exitosa de la foto con nombre nuevo</p></article></main>';
                            //echo '<br>';
                            header ("refresh:3; url=usuario_listado.php");
                        } else {
                            echo '<p>Algo fallo en la actualización e la foto con nombre nuevo</p>';
                            //echo '<br>';
                        }
                        $ubiNueva = '../img/usuarios/'.$nombre_foto;
                        // echo $ubiNueva;
                        // echo '<p>Ubicacion Nueva</p>';
                        // echo '<br>';
                        $resl = rename($ubiVieja, $ubiNueva);  //La funcion rename renombra $ubiVieja a $ubiNueva, moviendolo de carpeta si fuera nesesario (pero no es el caso).
                        if ($resl) {
                            // echo '<p>se cambio el nombre con exito</p>';
                            // echo '<br>';
                        } else {
                            // echo '<p>fracaso rotundo</p>';
                            // echo '<br>';
                        }
                    }

                    /*-------------------------------------------------------------------------------------*/ 
                }                 
            }
        }  

    


        if ($conexion) {
           $clave = sha1($_POST['clave']);
            $consulta = 'UPDATE usuario 
                        SET usuario = \''.$titulo.'\',
                        password = \''.$clave .'\',
                        mail = \''. $_POST['mail'].'\',
                        fecha_alta = \'' .$_POST['fecha'].'\',
                        tipo = \'' .$_POST['tipo'].'\'                        
                        WHERE id ='.$id;
            // echo $consulta;
            // echo '<p>Cnuslta 4</p>';
            // echo '<br>';
            $resultado = mysqli_query($conexion, $consulta);
            
            if ($resultado) {
                echo '<p>Actualización Exitosa</p>';
                header ("refresh:3; url=usuario_listado.php");
            } else {
                echo '<p>Algo fallo en la actualización</p>';
                header ("refresh:3; url=usuario_listado.php");
            }                  
        } else {
            echo '<p>No se pudo modificar</p>';
            // echo '<br>';
            header ("refresh:3; url=usuario_listado.php");
        }
        desconectar($conexion);       

    } else {
        echo '<p>No se pudo modificar, faltaron completar algunos campos</p>';
        // echo '<br>';
        header ("refresh:3; url=usuario_listado.php");
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