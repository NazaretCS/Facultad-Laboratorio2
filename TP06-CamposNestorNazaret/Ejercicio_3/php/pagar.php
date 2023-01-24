<?php 
    $ruta = '../css';
    require_once('../html/encavezado.html')  
?>
    <main>
        <section>
            <h2>Financiera "Pagas o Cobras"</h2>
            <article>
                <form action="procesarpaga.php" method="POST">
                    <label for="dni">DNI:
                        <input type="text" name="DNI" id="dni" placeholder="Ingrese su DNI">
                    </label>
                    
                    <input type="submit" value="Pagar"  class="boton2">
                </form>
            </article>
        </section>
    </main>
<?php 
    require_once('../html/pie.html')
?>
