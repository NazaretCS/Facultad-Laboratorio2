<?php
session_start();
if (!empty($_SESSION['usuario'])) {
    
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
                <h2>Contactenos</h2>          
            <form action="enviar_correo.php" method="POST">
            <fieldset class="formulario_de_contacto">               
                
                <label for="motivo">Motivo</label>
                    <select name="motivo" id="motivo">
                        <option value="ninguna">-- Seleccione --</option>
                        <option value="sujerencia">Sujerencia</option>
                        <option value="reclamo">Reclamo</option>
                                              
                    </select>
                
                <label for="comentario">Mensaje</label>
                    <textarea  cols="100" rows="10" name="mensaje" id="comentario" > </textarea>
                
                <input type="submit" value="Enviar" class="boton">
            </fieldset>
            </form>
        </article>
        </section>
    </main>

<?php
    require('../html/pie.html');
} else {
    header ('refresh:0; url=../index.html');
}
?>