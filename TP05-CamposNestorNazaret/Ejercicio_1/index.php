<?php
    $lugar = 'ccs';
    require_once('html/encavezado.html');
?>
<!--+++++++++++++++++++++++++++++++++++++++++   Formulario   +++++++++++++++++++++++++++++++++++++++++++++-->

        <section>
            <article>
                <form action="php/juego.php" method="post">
                    <label for="nomb">Nombre:
                        <input type="text" name="nombre" id="nomb">
                    </label>
                    <input type="submit" value="Jugar">
                </form>
            </article>
        </section>
    </main>
    
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php
    require_once('html/pie.html');
?>