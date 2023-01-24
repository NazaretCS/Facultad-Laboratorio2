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
                
                <h2>Configuraciones</h2>
                <section class="SeccionConfiguraciones">
                <form action="configuracion_ok.php" method="post" class="formularioDeConfiguraciones">
                    <label for="config">
                        <input type="radio" name="config" value="clasico" id="config">Clásico
                    </label>
                    <figure>
                        <img src="../img/clasico.PNG">
                    </figure>
                    <label for="conf">
                         <input type="radio" name="config" value="moderno" id="conf">Moderno 
                    </label>
                    <figure>
                        <img src="../img/moderno.PNG">
                    </figure>
                    <input type="submit" value="Guardar Cambios" class="botonDeConfiguracion">
                    
                </form>
                <a href="pelicula_listado.php"><article class="botones">Cancelar</article></a>
                </section>

            </article>
        </section>
    </main>

<?php
   

    require('../html/pie.html');
} else {
    header ('refresh:0; url=../index.html');
}
?>