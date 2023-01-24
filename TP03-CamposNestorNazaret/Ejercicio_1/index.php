<?php
    require_once('html/encavezado.html');
?>

    <main>
        <section>
            <article>
                <h2>Números Narcisistas</h2>
                <?php
        

                    //genro el numero aleatoreo (entre 1 y 99999 para que mi programa tenga mayor alcanze)
                    $numero=mt_rand(1,99999);
                    
                    //inicializo lo que seria mi contador y mi acumulador
                    $contador= 0;
                    $calculo=0;

                    //Tomo dos auxiliares de el numero generado para luego aprovecharlo sin perderlo
                    $aux=$numero;
                    $auxi=$numero;
                    
                    
                    echo '<p> El Número es: ' . $numero .'</p>';

                    //Uso este primer While para que se encargue de darme la cantidad de diguitos que tiene el numero generado, cantidad que guardo en mi contador.
                    while ($aux>0) {
                        $contador++;
                        $aux = (int) ($aux/10); // int ($aux/10) lo que ara sera tomar el cosiente de mi divicion en 10, para que asi valla perdiendo dijitos por cada vuelta.
                    }
                    
                    //En este segundo While lo que ago es: al numero le saco un dijito (el ultimo en mi caso) y a ese diguito lo elevo a la cantidad de dijitos que contenga mi numero (osea a contador)... asi en cada vuelta, saliendo de la estructura unicamente cuando la varialbe auxiliar $auxi sea menor que cero.
                    while ($auxi>0) {
                        $ultimoDig = $auxi % 10;
                        $calculo = $calculo + ($ultimoDig ** $contador);
                        $auxi = (int) ($auxi/10);
                    }

                    echo '<p> El Calculo es: ' .$calculo. '</p>';

                    // aprovecho la estructura if para mostrar o no un cartel diciendo si el numero es Narcisista
                    if ($numero===$calculo) {
                        echo '<p class="ganador"><strong>Numero Narcisista!!! </strong></p>';

                    } else {
                        echo '<p class="perdedor"><strong>No es Numero Narcisista</strong></p>';
                    }
                ?>

            </article>
        </section>
    </main>

<?php
    require_once('html/pie.html');
    
?>