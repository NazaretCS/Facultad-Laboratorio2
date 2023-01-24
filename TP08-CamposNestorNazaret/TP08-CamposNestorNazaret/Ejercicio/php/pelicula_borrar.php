<?php
    $ruta = '../css';
    require('../html/encavezado.html');
    $id = $_GET['id'];
?>
    <main>
        <section class="seccion">
            <article>
                <?php
                    require('menu.php');
                ?>                
            </article>
            <article>
                <!-----------------------------   MOSTRAR LOS DATOS DE LA PELICULA A BORRAR --------------------->
                <h2>Eliminar Película</h2>
                <?php

                    require ('conexion.php');
                    $bd = 'peliculas';
                    $conexion = conectar($bd);
                    
                    $consulta = 'SELECT * FROM pelicula WHERE id= '.$id;
                    //echo $consulta;  //mostrar la consulta siempre ayuda a encontrar errores
                                        
                    $q = mysqli_query($conexion, $consulta);
                    if ($q){   // mysqli_query() me devolvera un booleano, por lo tanto me sera mas facil saber si la consulta fue exitosa o no.
                        if (mysqli_num_rows($q)) {   // Este if me tomara como falso unicamente en el caso de que el numero de filas sea igual cero.
                            //echo '<p>Trajo Algo</p>';
                            $fila = mysqli_fetch_array($q)
                            ?>
                                <section>
                                    <article class="peliculas">
                                        <figure>
                                            <?php
                                                if  (!empty($fila['foto_portada'])) {
                                                    ?>
                                                        <img src="../img/portadas/<?php echo $fila['foto_portada'];?>" alt="Foto de portada de la pelicula">;
                                                    <?php
                                                } else {
                                                    echo '<img src="../img/sin_imagen.png" alt="La pelicula no tiene adjuntada una portada">';
                                                }
                                            ?>
                                        </figure>
                                        <article>
                                                <p> ¿Seguro que desea Eliminar a <strong><?php echo $fila['titulo']; ?>? </strong></p>
                                                <p>Genero: <?php echo $fila['genero']; ?></p>
                                                <p>Fecha de Estreno: <?php echo $fila['fecha_estreno']; ?></p>
                                                <p>Dureación: <?php echo $fila['duracion']; ?></p>

                                                
                                        </article>                                        
                                    </article>
                                <section>
                                <section class="seccion">
                                    <a href="pelicula_borrar_ok.php?id=<?php echo $id;?>"><article class="botones">Aceptar</article></a>
                                    <a href="pelicula_listado.php"><article class="botones">Cancelar</article></a>
                                </section>
                            <?php
                            
                            
                        } else {
                            echo '<p>No Se Encontraron Datos</p>';
                            header ('refresh:5; url=../index.html');
                        }
                    } else {
                        echo '<p>Error en la consulta</p>';
                    }                    
                    desconectar($conexion);                
                ?>
                <!------------------------------------------------------------------------------------------------>
            </article>
        </section>
    </main>

<?php
    require('../html/pie.html');
?>