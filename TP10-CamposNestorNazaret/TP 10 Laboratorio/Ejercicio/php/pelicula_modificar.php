<?php
session_start();
if (!empty($_SESSION['usuario'])) {
    $ruta = '../css';
    require('../html/encavezado.html');
    if ($_SESSION['tipo'] == 'Administrador' || $_SESSION['tipo'] == 'Editor') {
            
            

            /*-------------------------   MOSTRADO DE FORMULARIO PARA ACTUALIZAR LOS DATOS   --------------------------*/

            require('conexion.php');
            $bd = 'peliculas';
            $conexion = conectar($bd);
            if ($conexion && !empty($_GET['id'])) {
                $id = $_GET['id'];
                $consulta = 'SELECT * FROM pelicula WHERE id ='.$id;
                $resultado = mysqli_query($conexion, $consulta);
                desconectar($conexion);
                if (mysqli_num_rows($resultado)>0) {
                    $fila = mysqli_fetch_array($resultado);

                    ?>
                        <main>
                            <section class="seccion">
                                <article>
                                    <?php
                                        require('menu.php');                    
                                    ?>
                                    
                                </article>
                                <article>
                                <form action="pelicula_modificar_ok.php" method="POST" enctype="multipart/form-data">
                                <fieldset class="datos2">
                                    <label for="tit">Titulo
                                        <input type="text" name="titulo" id="tit" value="<?php echo $fila['titulo'] ?>">
                                    </label>
                                    <label for="durac">Duración
                                        <input type="number" name="duracion" id="durac" min = "0" value="<?php echo $fila['duracion'] ?>">
                                    </label>
                                    <label for="gen">Genero
                                        <select name="genero" id="gen">
                                            <?php
                                            $variable = $fila['genero'];  
                                            ?>

                                            <option value="ninguna">-- Seleccione --</option>
                                            <option value="acción" <?php if ($variable == 'acción' ) echo 'selected' ?>>Acción</option>
                                            <option value="comedia" <?php if ($variable == 'comedia' ) echo 'selected' ?>>Comedia</option>
                                            <option value="terror" <?php if ($variable == 'terror' ) echo 'selected' ?>>Terror</option>
                                            <option value="ciencia ficcion" <?php if ($variable == 'ciencia ficcion' ) echo 'selected' ?>>Ciencia Ficción</option>
                                            <option value="suspenso" <?php if ($variable == 'suspenso' ) echo 'selected' ?>>Suspenso</option>
                                            
                                        </select>
                                    </label>
                                    <label for="fec">Fecha de Estreno
                                        <input type="date" name="fecha" id="fec" value="<?php echo $fila['fecha_estreno'] ?>">
                                    </label>
                                    <label for="fot">Subir Foto
                                        <input type="file" name="foto" id="fot" >
                                    </label>
                                    <input type="hidden" name="id" value="<?php echo $id ?>"    >
                                    <input type="submit" value="Cargar" class="boton">
                                </fieldset>
                                </form>
                            </article>
                            </section>
                        </main>

                    <?php                
                    
                }        

            } else {
                echo '<p>No se pudo modificar</p>';
                header ("refresh:3; url=pelicula_listado.php");
            }

            /*----------------------------------------------------------------------------------------------------------*/
            
    }   else {
        echo '<main><article><p>No deveria estar aqui</p></article></main>';
        header ('refresh:3; url=pelicula_listado.php');
    }
} else {
    header ('refresh:0; url=../index.html');
}
require('../html/pie.html');
?>
