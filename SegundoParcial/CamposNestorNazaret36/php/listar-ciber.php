<?php
    $ruta = '../css';
    require('../html/cabecera.html');
    require '../html/menu-secundario.html';

    /*-----------------------------   MOSTRADO DE DATOS DE LA TABLA USUARIOS   --------------------------------*/
?>

    <main>
        <section>
            
            <article>
                <?php
                    require ('funciones-conexion.php');
                    
                    $conexion = conectar();
                    
                    $consulta = 'SELECT * FROM ciber ';
                    //echo $consulta;  //mostrar la consulta siempre ayuda a encontrar errores
                                        
                    $q = mysqli_query($conexion, $consulta);
                    if ($q){   // mysqli_query() me devolvera un booleano, por lo tanto me sera mas facil saber si la consulta fue exitosa o no.
                        if (mysqli_num_rows($q)) {   // Este if me tomara como falso unicamente en el caso de que el numero de filas sea igual cero.
                            //echo '<p>Trajo Algo</p>';
                            ?>
                                <h2>Listado del Ciber</h2>
                                <table>
                                    <tr>
                                        <th>Num_Maquina</th>
                                        <th>Fecha</th>
                                        <th>Horas_uso</th>
                                        <th>Recaudación</th>
                                        <th>Foto_PC</th>
                                    </tr>
                                
                            <?php

                            while ($fila = mysqli_fetch_array($q)) {
                                ?>                                
                                <tr>
                                    <td><?php echo $fila['nro_maquina']; ?></td>
                                    <td><?php echo $fila['fecha']; ?></td>
                                    <td><?php echo $fila['horas_uso']; ?></td>
                                    <td><?php echo $fila['recaudacion']; ?></td>
                                    <td>
                                            <figure>
                                                <?php
                                                    if  (!empty($fila['foto_pc'])) {
                                                        ?>
                                                            <img src="../imagenes/<?php echo $fila['foto_pc'];?>" alt="Foto de la computadora">;
                                                        <?php
                                                    }
                                                ?>
                                            </figure>
                                    </td>                                   
                                </tr>                                
                            <?php
                            }
                            echo  '</table>';
                        } else {
                            echo '<p>No Se Encontraron Datos</p>';
                            header ('refresh:5; url=../index.php');
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
    /*-----------------------------   MOSTRADO DE DATOS DE LA TABLA USUARIOS   --------------------------------*/

    require('../html/pie.html');

?>