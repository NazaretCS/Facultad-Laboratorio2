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
                <article>
                    <!-----------------------------   MOSTRAR LOS DATOS DEL USUARIO A BORRAR --------------------->
                    <h2>Eliminar Usuario</h2>
                    <?php

                        require ('conexion.php');
                        $bd = 'peliculas';
                        $conexion = conectar($bd);
                        
                        $consulta = 'SELECT * FROM usuario WHERE id= '.$id;
                        //echo $consulta; 
                                            
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
                                                    if  (!empty($fila['foto'])) {
                                                        ?>
                                                            <img src="../img/usuarios/<?php echo $fila['foto'];?>" alt="Foto de portada del usuario">;
                                                        <?php
                                                    } else {
                                                        echo '<img src="../img/usuarios/usuario_default.png" alt="El usuario no tiene adjuntada una foto de portada">';
                                                    }
                                                ?>
                                            </figure>
                                            <article>
                                                    <p> ¿Seguro que desea Eliminar al usuario <strong><?php echo $fila['usuario']; ?>? </strong></p>
                                                    <p>Tipo: <?php echo $fila['tipo']; ?></p>
                                                    <p>Correo de contacto: <?php echo $fila['mail']; ?></p>
                                                    

                                                    
                                            </article>                                        
                                        </article>
                                    <section>
                                    <section class="seccion">
                                        <a href="usuario_eliminar_ok.php?id=<?php echo $id;?>"><article class="botones">Aceptar</article></a>
                                        <a href="usuario_listado.php"><article class="botones">Cancelar</article></a>
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
    } else {
        echo '<main><article><p>No tiene los persimos suficientes para estar aqui</p></article></main>';
        header ('refresh:3; url=pelicula_listado.php');
    }    
} else {
    header ('refresh:0; url=../index.html');
}
                
require('../html/pie.html');
?>