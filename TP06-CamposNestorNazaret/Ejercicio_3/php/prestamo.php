<?php 
    $ruta = '../css';
    require_once('../html/encavezado.html');  
?>
    <main>
        <section>
            <h2>Financiera "Pagas o Cobras"</h2>
            <article>
                <form action="procesarprestamo.php" method="POST">
                    <label for="dni">DNI:
                        <input type="text" name="DNI" id="dni" placeholder="Ingrese su DNI">
                    </label>
                    <label for="monto">Monto: 
                        <input type="number" name="cantidad" id="monto" min = "0" value="5000">
                    </label>
                    <input type="submit" value="Solisitar Prestamo"  class="boton1">
                </form>
            </article>
        </section>
    </main>
<?php 
    require_once('../html/pie.html');
?>


