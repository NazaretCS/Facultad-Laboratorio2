<?php
session_start();
if (!empty($_SESSION['usuario'])) {
    $ruta = '../css';
    require('../html/encavezado.html');


    /*-----------------------------   MOSTRADO DE DATOS DE LA TABLA USUARIOS   --------------------------------*/
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
                                        <?php 
                                            if ($_SESSION['tipo'] == 'Administrador' || $_SESSION['tipo'] == 'Editor'){
                                                echo '<th>Modificar</th>';
                                            }
                                            if ($_SESSION['tipo'] == 'Administrador'){
                                                echo '<th>Eliminar</th>';
                                            }
                                        ?>
                                    </tr>
                                
                            <?php

                            while ($fila = mysqli_fetch_array($q)) {
                                ?>                                
                                <tr>
                                    <td><?php echo $fila['usuario']; ?></td>
                                    <td><?php echo $fila['mail']; ?></td>
                                    <td><?php echo $fila['fecha_alta']; ?></td>
                                    <td><?php echo $fila['tipo']; ?></td>
                                    <?php 
                                        if($_SESSION['tipo'] == 'Administrador' || $_SESSION['tipo'] == 'Editor'){
                                            ?>
                                            <td>
                                                <figure class="borrar-editar"> 
                                                    <a href="usuario_modificar.php?id=<?php echo $fila['id'];?>"><img src="../img/edit_pencil.png" alt="Lapiz de escrivir, referenciando a hacer una modificación"></a>
                                                </figure>
                                            </td>
                                            <?php
                                        } 
                                        if($_SESSION['tipo'] == 'Administrador') {
                                            ?>
                                                <td>
                                                    <figure class="borrar-editar"> 
                                                        <a href="usuario_eliminar.php?id=<?php echo $fila['id'];?>"><img src="../img/trash_empty.png" alt="Tacho de basura"></a>
                                                    </figure>
                                                </td>       
                                            <?php
                                        }
                                    ?>                                    
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
    /*-----------------------------   MOSTRADO DE DATOS DE LA TABLA USUARIOS   --------------------------------*/

    require('../html/pie.html');
} else {
    header ('refresh:0; url=../index.html');
}
?>