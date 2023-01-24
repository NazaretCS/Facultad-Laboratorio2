<?php
    session_start();
    $ruta = '../css';
    require('../html/encavezado.html');
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
                /*----------------------------   MOSTRAR LAS PELICULAS COMO LISTADO ----------------------------*/
                if (!empty($_SESSION['usuario'])) {                                       
                    //echo $_COOKIE[$_SESSION['usuario']];
                    require('conexion.php');
                    $bd = 'peliculas';
                    $conexion = conectar($bd);
                    if ($conexion) {
                        if (!empty($_COOKIE[$_SESSION['usuario']])) {              
                            $prefe = explode(',', $_COOKIE[$_SESSION['usuario']]);
                            //var_dump($prefe);
                            $consulta = 'SELECT *
                                        FROM pelicula
                                        WHERE ';
                            foreach ($prefe as $clave => $valor){
                                //echo $valor;
                                //echo '<br>';
                                //echo $consulta;
                                
                                $consulta .= 'id='.$valor.' OR ';
                                //echo '<br>';
                                //echo $consulta;
                                //echo '<br>';
                            }
                            $consulta = rtrim($consulta, 'OR ');
                            //echo $consulta; 
                        } else {
                            $consulta = 'SELECT *
                                        FROM pelicula';
                        }
                        $resultado = mysqli_query($conexion, $consulta);
                        desconectar($conexion);
                    

                        $numFilas = mysqli_num_rows($resultado);
                        if ($numFilas > 0) {
                            ?> 
                            <h2>Listado de Peliculas Favoritas</h2>
                            <section>
                                <?php while($fila=mysqli_fetch_array($resultado)){ ?>
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
                                        </article>
                                    </article>
                                <?php } ?>   
                            </section>
                            <?php
                        }
                    } else {
                        echo '<p>No Se Pudo Conectar</p>';
                        header('refresh:5; ../index.html');
                    }
                    /*----------------------------   MOSTRAR LAS PELICULAS COMO LISTADO ----------------------------*/
                } else {
                    echo '<p>No Se Inició Sesión</p>';
                    header('refresh:5; ../index.html');
                }   
                ?>
            </article>
        </section>
    </main>
<?php
    require('../html/pie.html');
?>