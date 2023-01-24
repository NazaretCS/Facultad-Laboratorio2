<?php
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
                <?php
                    require ('conexion.php');
                    $bd = 'peliculas';
                    $conexion = conectar($bd);
                    
                    $consulta = 'SELECT * FROM usuario ';
                    //echo $consulta;  //mostrar la consulta siempre ayuda a encontrar errores
                                        
                    $q = mysqli_query($conexion, $consulta);
                    if ($q){   // mysqli_query() me devolvera un booleano, por lo tanto me sera mas facil saber si la consulta fue exitosa o no.
                        if (mysqli_num_rows($q)) {   // Este if me tomara como falso unicamente en el caso de que el numero de filas sea igual cero.
                            //echo '<p>Trajo Algo</p>';
                            ?>
                                <h2>Listado de Usuarios</h2>
                                <table>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Mail</th>
                                        <th>Fecha Alta</th>
                                        <th>Tipo</th>
                                    </tr>
                                
                            <?php

                            while ($fila = mysqli_fetch_array($q)) {
                                ?>                                
                                <tr>
                                    <td><?php echo $fila['usuario']; ?></td>
                                    <td><?php echo $fila['mail']; ?></td>
                                    <td><?php echo $fila['fecha_alta']; ?></td>
                                    <td><?php echo $fila['tipo']; ?></td>
                                </tr>                                
                            <?php
                            }
                            echo  '</table>';
                        } else {
                            echo '<p>No Se Encontraron Datos</p>';
                            header ('refresh:5; url=../index.html');
                        }
                    } else {
                        echo '<p>Error en la consulta</p>';
                    }
                    
                    desconectar($conexion);



                
                ?>

            </article>
        </section>
    </main>

<?php
    require('../html/pie.html');
?>