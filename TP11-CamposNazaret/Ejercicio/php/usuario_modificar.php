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
            $consulta = 'SELECT * FROM usuario WHERE id ='.$id;
            $resultado = mysqli_query($conexion, $consulta);
            desconectar($conexion);
            if (mysqli_num_rows($resultado)>0) {
                $fila = mysqli_fetch_array($resultado);
                //var_dump($fila);

                ?>
                    <main>
                        <section class="seccion">
                            <article>
                                <?php
                                    require('menu.php');                    
                                ?>
                                
                            </article>
                            <article>
                            <form action="usuario_modificar_ok.php" method="POST" enctype="multipart/form-data">
                            <fieldset class="datos2">
                                <label for="usu">Usuario: 
                                    <input type="text" name="usuario" id="usu" value="<?php echo $fila['usuario'] ?>">
                                </label>
                                <label for="contrasenia">Contraseña: 
                                    <input type="text" name="clave" id="contrasenia"  placeholder="**** Ingresar Clave ****"> 
                                </label>
                                <label for="correo">Correo: 
                                    <input type="text" name="mail" id="correo" value="<?php echo $fila['mail'] ?>">
                                </label>
                                <label for="fec">Fecha de Cargado:
                                    <input type="date" name="fecha" id="fec" value="<?php echo $fila['fecha_alta'] ?>">
                                </label>
                                <label for="gen">Tipo: 
                                    <select name="tipo" id="gen">
                                        <?php
                                        $variable = $fila['tipo'];
                                        
                                        ?>

                                        <option value="ninguna">--  Seleccione  --</option>
                                        <option value="Editor" <?php if ($variable == 'Editor' ) echo 'selected' ?>>Editor</option>
                                        <option value="Administrador" <?php if ($variable == 'Administrador' ) echo 'selected' ?>>Admisnitrador</option>
                                        <option value="Restringido" <?php if ($variable == 'Restringido' ) echo 'selected' ?>>Restringido</option>                                       
                                        
                                    </select>
                                </label>
                                
                                <label for="fot">Subir Foto
                                    <input type="file" name="foto" id="fot">
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
    require('../html/pie.html');
} else {
    header ('refresh:0; url=../index.html');
}
?>