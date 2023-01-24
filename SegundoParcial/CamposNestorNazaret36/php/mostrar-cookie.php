<?php
     $ruta = '../css';
    require '../html/cabecera.html';
    require '../html/menu-secundario.html';

    //echo $_COOKIE['ciber'];


    
?>


<?php
    
    
    ?>
    <main>
        <section>
            
            <article>
                <?php 
                
                                                     
                    //echo $_COOKIE[$_SESSION['usuario']];
                    require('funciones-conexion.php');
                    
                    $conexion = conectar();
                    if ($conexion) {
                        if (!empty($_COOKIE['ciber'])) {              
                            $prefe = explode(',', $_COOKIE['ciber']);
                            //var_dump($prefe);
                            $consulta = 'SELECT *
                                        FROM ciber
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
                                        FROM ciber';
                        }
                        $resultado = mysqli_query($conexion, $consulta);
                        desconectar($conexion);
                    

                        $numFilas = mysqli_num_rows($resultado);
                        if ($numFilas > 0) {
                            ?> 
                            <h2>Listado de Favoritas</h2>
                            <section>
                                <?php while($fila=mysqli_fetch_array($resultado)){ ?>
                                    <article >
                                        <figure>
                                        <?php
                                                    if  (!empty($fila['foto_pc'])) {
                                                        ?>
                                                            <img src="../imagenes/<?php echo $fila['foto_pc'];?>" alt="Foto de la pc">;
                                                        <?php
                                                    } 
                                                ?>
                                        </figure>
                                        <article>                                
                                            <h3><?php echo $fila['nro_maquina']; ?></h3>
                                            
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
                    
                 
                ?>
            </article>
        </section>
    </main>
<?php
    require('../html/pie.html');
?>
