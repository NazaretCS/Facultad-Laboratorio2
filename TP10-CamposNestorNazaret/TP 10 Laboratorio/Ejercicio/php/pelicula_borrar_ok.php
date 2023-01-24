<?php
session_start();
if (!empty($_SESSION['usuario'])) {
      
    $ruta = '../css';
    require('../html/encavezado.html');
    if ($_SESSION['tipo'] == 'Administrador') {
        $id = $_GET['id'];
    ?>
        <main>
            <section class="seccion">
                <article>
                    <?php
                        require('menu.php');
                    ?>                
                </article>
                <section>
                <h2>Eliminar Pelicula</h2>
                
                <article class="peliculas">
                    
                    <?php               
                    /*--------------------------   BORRADO DE IMAGEN DE LA CARPETA PORTADAS   --------------------*/  

                        require ('conexion.php');
                        $bd = 'peliculas';
                        $conexion = conectar($bd);
                        $consulta2 = 'SELECT * FROM pelicula WHERE id= '.$id;
                        //echo $consulta2;
                        $q2 = mysqli_query($conexion, $consulta2);  //genero una consulta para poder sacar los dato de la pelicula correspondiente al id para asi eliminar la foto de portada de la carpeta portadas
                        if ($q2){
                            if (mysqli_num_rows($q2)) {   // Este if me tomara como falso unicamente en el caso de que el numero de filas sea igual cero.
                            //echo '<p>Trajo Algo</p>';
                                $fila = mysqli_fetch_array($q2);
                                $ubicacionArchivo = '../img/portadas/'.$fila['foto_portada'];
                                if (unlink($ubicacionArchivo)){
                                    //echo '<p>Eliminado Exitoso de la imagen</p>';
                                } else {
                                    //echo '<p>Eliminado defectuoso de la imagen</p>';
                                }
                            }
                        }
                    /*-------------------------------------------------------------------------------------------*/ 

                    /*---------------------------   BORRADO DE DATOS DE LA BASE DE DATOS   ----------------------*/

                        $consulta = 'DELETE FROM pelicula WHERE id= '.$id;
                        //echo $consulta;  //mostrar la consulta siempre ayuda a encontrar errores
                                            
                        $q = mysqli_query($conexion, $consulta);
                        if ($q){   // mysqli_query() me devolvera un booleano, por lo tanto me sera mas facil saber si la consulta fue exitosa o no.
                            echo '<p>Eliminado Exitoso</p>';
                            header ('refresh:5; url=pelicula_listado.php');                        
                        } else {
                            //echo '<p>Error en la consulta</p>';
                            header ('refresh: 10 ; url=pelicula_listado.php');
                        }                    
                        desconectar($conexion);   
                    /*-------------------------------------------------------------------------------------------*/              
                    
                    
                    ?>
                </article>
                </section>
            </section>
        </main> 
                

<?php
    } else {
        echo '<main><article><p>No tiene los permisos suficientes para estar aqui</p></article></main>';
        header ('refresh:3; url=pelicula_listado.php');
    }
                
    require('../html/pie.html');
} else {
    header ('refresh:0; url=../index.html'); 
}
?>