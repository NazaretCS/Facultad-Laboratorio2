<?php
session_start();
if (!empty($_SESSION['usuario'])) {
    if($_SESSION['tipo'] == 'Administrador') {
    
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
                <form action="procesar_pelicula.php" method="POST" enctype="multipart/form-data">
                <fieldset class="datos2">
                    <label for="tit">Titulo
                        <input type="text" name="titulo" id="tit">
                    </label>
                    <label for="durac">Duración
                        <input type="number" name="duracion" id="durac" min = "0">
                    </label>
                    <label for="gen">Genero
                        <select name="genero" id="gen">
                            <option value="ninguna">-- Seleccione --</option>
                            <option value="acción">Acción</option>
                            <option value="comedia">Comedia</option>
                            <option value="terror">Terror</option>
                            <option value="ciencia ficcion">Ciencia Ficción</option>
                            <option value="suspenso">Suspenso</option>                        
                        </select>
                    </label>
                    <label for="fec">Fecha de Estreno
                        <input type="date" name="fecha" id="fec">
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
                
} else {
    header ('refresh:0; url=../index.html');
}
require('../html/pie.html');
?>