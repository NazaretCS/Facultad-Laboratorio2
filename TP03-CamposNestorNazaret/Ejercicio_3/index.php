<?php
    require('html/encavezado.html'); //introdusco la parte del encabezado de mi paguina

    
    $puntos=0;
    $bombas=10;  //la variable $bombas me permite determinar la cantidad de bombas que tendra mi juego.
    $matriz=[];
    
   
    for ($i=0; $i < 10 ; $i++) { 
        for ($j=0; $j < 10; $j++) { 
            $matriz[$i][$j]='-';
        }
    }
    // la estructura for anterior lo que hace es crearme mi matriz de 10x10, completandola con guines medios '-'

   

    while ($bombas > 0) {
        $bombaI = mt_rand(0,9);
        $bombaJ = mt_rand(0,9);
        //genero aleatoremente valores que luego usare com sub-indices para uvicarme en distintas posiciones dentro de mi matriz.
        if ($matriz[$bombaI][$bombaJ] == '-') {
            $matriz[$bombaI][$bombaJ] = 'B';
            $bombas--;
        }
    }
    //esta estructura While lo que hace en si es generar los numeros aleatoreos y si en esa uvicacion mi matriz contiene un guion medio coloca una bomba 'B', ademas hace decrecer la cantidad de bombas en uno, para que solo tenga 10 bombas a lo largo de todo mi matriz
    
    do {
        $tiroI = mt_rand(0,9);
        $tiroJ = mt_rand(0,9);
        // genero dos coordenadas aleatoreas para simular un tiro hacia una cordenada al azar.
        if ($matriz[$tiroI][$tiroJ] == '-') {
            $matriz[$tiroI][$tiroJ] = 'X';
            $puntos++;
        }
    } while ($matriz[$tiroI][$tiroJ] != 'B');
    //mediante la estructura Do While me aseguro aunque sea un tiro de mi programa, y en caso de que ese tiro no de en una bomba reemplazo el gion medio por una X simulando que ese lugar estaba limpio de bombas; ademas incremento la cantidad de puntos en 1.

?>


<main>
    <h2>Buscaminas</h2>
    <table>
        <?php for ($i=0; $i < 10; $i++) { ?>
            <tr>
                <?php for ($j=0; $j < 10 ; $j++) { ?>
                    <td> <?php echo $matriz[$i][$j] ?> </td>
                <?php } ?>
            </tr>
        <?php } ?> 
    </table>
    <p class='parrafo2'> Puntos: <?php echo $puntos ?> </p>
</main>
<!-- Muestro mi matriz en forma de una tabla, para eso me ayudo con dos estructuras For, una referente a las filas y otra a las columnas   -->

<?php  
    require('html/pie.html');//introduzco la parte del pie de mi paguina 
?>



