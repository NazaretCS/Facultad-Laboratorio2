<?php

    session_start();
    //echo $_SESSION['usuario'].' - '.$_SESSION['foto'];
    if (!empty($_SESSION['usuario'])) {
        $ruta = '../css';
        require('../html/encavezado.html');
    ?>
        <main>
            <section class="seccion">
                <article>
                    <?php
                        require('menu.php');
                        //echo '<p>fue buena</p>';
                    ?>                
                </article>
                <article>
                    <h2>Listado de Peliculas</h2>
                    <?php
                    /*----------------------------   MOSTRAR LAS PELICULAS COMO LISTADO ----------------------------*/
                        require ('conexion.php');
                        $bd = 'peliculas';
                        $conexion = conectar($bd);
                        
                        $consulta = 'SELECT * FROM pelicula ';
                        //echo $consulta;  //mostrar la consulta siempre ayuda a encontrar errores
                                            
                        $q = mysqli_query($conexion, $consulta);
                        if ($q){   // mysqli_query() me devolvera un booleano, por lo tanto me sera mas facil saber si la consulta fue exitosa o no.
                            if (mysqli_num_rows($q)) {   // Este if me tomara como falso unicamente en el caso de que el numero de filas sea igual cero.
                                //echo '<p>Trajo Algo</p>';
                                while ($fila = mysqli_fetch_array($q)) {
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
                                                    <h3><?php echo $fila['titulo']; ?></h3>
                                                    <p>Genero: <?php echo $fila['genero']; ?></p>
                                                    <p>Fecha de Estreno: <?php echo $fila['fecha_estreno']; ?></p>
                                                    <p>Dureación: <?php echo $fila['duracion']; ?></p>
                                                    <figure class="borrar-editar">
                                                    <?php 
                                                            if ($_SESSION['tipo'] == 'Administrador' || $_SESSION['tipo'] == 'Editor') {
                                                                ?>
                                                                <a href="pelicula_modificar.php?id=<?php echo $fila['id'];?>"><img src="../img/edit_pencil.png" alt="Lapiz de escrivir, referenciando a hacer una modificación"></a>
                                                                <?php
                                                            }
                                                        ?>   
                                                        
                                                        <?php 
                                                            if ($_SESSION['tipo'] == 'Administrador') {
                                                                ?>
                                                                <a href="pelicula_borrar.php?id=<?php echo $fila['id'];?>"><img src="../img/trash_empty.png" alt="Tacho de basura"></a>
                                                                <?php
                                                            }
                                                        ?>                                                       

                                                        <a href="pelicula_favorito.php?id=<?php echo $fila['id'];?>"><img src="../img/estrella.png" alt="Estrella referenciando a poner en favoritos"></a>
                                                    </figure>
                                            </article>                                        
                                        </article>
                                    <section>
                                <?php
                                }
                                
                            } else {
                                echo '<p>No Se Encontraron Datos</p>';
                                header ('refresh:5; url=../index.html');
                            }
                        } else {
                            echo '<p>Error en la consulta</p>';
                        }                    
                        desconectar($conexion);    
    
                    /*-----------------------------------------------------------------------------------*/            
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
   
   