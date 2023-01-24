<?php
    session_start();
    if (!empty($_SESSION['usuario'])) {
        $ruta = '../css';
        require('../html/encavezado.html');
        if($_SESSION['tipo'] == 'Administrador') {
        
            
        ?>
            <main>
                <section class="seccion">
                    <article>
                        <?php
                            require('menu.php');                   
                        ?>
                        
                    </article>
                    <article>            
                        <form action="usuario_alta_ok.php" method="POST" enctype="multipart/form-data">
                        <fieldset class="datos2">
                            <label for="usu">Nombre de Usuario:
                                <input type="text" name="usuario" id="usu">
                            </label>
                            <label for="contrasenia">Contraseña: 
                                <input type="text" name="clave" id="contrasenia">
                            </label>
                            <label for="correo">Correo: 
                                <input type="text" name="mail" id="correo">
                            </label>
                            <label for="fec">Fecha de Cargado:
                                <input type="date" name="fecha" id="fec">
                            </label>
                            <label for="gen">Tipo: 
                                <select name="tipo" id="gen">
                                    <option value="ninguna">-- Seleccione --</option>
                                    <option value="Editor">Editor</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Restringido">Restringido</option>                      
                                </select>
                            </label>
                            <label for="fot">Subir Foto
                                <input type="file" name="foto" id="fot">
                            </label>
                            <input type="submit" value="Cargar" class="boton">
                        </fieldset>
                        </form>
                    </article>
                </section>
            </main>


    <?php 
        } else {
            echo '<main><article><p>No tiene permiso para ingresar a esta area</p></article></main>';
            header ('refresh:3; url=pelicula_listado.php');
            
        }
    require('../html/pie.html');
    } else {
        header ('refresh:0; url=../index.html');
    }
    ?> 
     

