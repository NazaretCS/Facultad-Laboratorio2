
<?php
   
    require('html/encavezado.html'); //introdusco la parte del encabezado de mi paguina
    require_once('php/funcion.php'); //requiero el archivo funcion.php porque sino no podria utilizar la funcion aleatoreoSinRepetir.

    
    $aciertosParticipante1 = 0;
    $aciertosParticipante2 = 0;
    $aciertosParticipante3 = 0;
    $aciertosParticipante4 = 0;

    
    $cantidadDelElementosDeArreglo = 6;
    $desde = 1;
    $hasta = 45;

/*++++++++++++++++++++++++  Genero los valores aletoreos para mis arreglos  +++++++++++++++++++++++*/
    $participante1 = aleatoreoSinRepetir($cantidadDelElementosDeArreglo, $desde, $hasta);
    $participante2 = aleatoreoSinRepetir($cantidadDelElementosDeArreglo, $desde, $hasta);
    $participante3 = aleatoreoSinRepetir($cantidadDelElementosDeArreglo, $desde, $hasta);
    $participante4 = aleatoreoSinRepetir($cantidadDelElementosDeArreglo, $desde, $hasta);
    $sorteo = aleatoreoSinRepetir($cantidadDelElementosDeArreglo, $desde, $hasta);
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/


/*+++++++++++++++++++  Verifico los aciertos de los participantes con foreach  ++++++++++++++++++*/
    foreach ($participante1 as $value) {
        if (in_array($value, $sorteo)) {
            $aciertosParticipante1++;
        }
    }
    foreach ($participante2 as $value) {
        if (in_array($value, $sorteo)) {
            $aciertosParticipante2++;
        }
    }
    foreach ($participante3 as $value) {
        if (in_array($value, $sorteo)) {
            $aciertosParticipante3++;
        }
    }
    foreach ($participante4 as $value) {
        if (in_array($value, $sorteo)) {
            $aciertosParticipante4++;
        }
    }
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/   
    
  
?>
<!--++++++++++++++++++++++++++++  Muestro los resultados obtenidos  ++++++++++++++++++++++++++++++--> 
<main>
    <section >
        <article class="section">
            <figure class="figure">
                <img title ="Silueta de Persona" src="img/usuario.png" alt="imagen aseemejadora de la silueta de una persona">
                <figcaption class="participante"> <?php echo  $participante1[0].' '. $participante1[1]. ' '. $participante1[2]. ' '. $participante1[3]. ' '. $participante1[4]. ' '. $participante1[5] ?> </figcaption> <!--Mediante figcaption lo que ago es mopstrar todos los numeros que "seleccionaron" los participantes-->
            </figure>
            <figure class="figure">
                <img title ="Silueta de Persona" src="img/usuario.png" alt="imagen aseemejadora de la silueta de una persona">
                <figcaption class="participante"> <?php echo  $participante2[0].' '. $participante2[1]. ' '. $participante2[2]. ' '. $participante2[3]. ' '. $participante2[4]. ' '. $participante2[5] ?> </figcaption>
            </figure>
            <figure class="figure">
                <img title ="Silueta de Persona" src="img/usuario.png" alt="imagen aseemejadora de la silueta de una persona">
                <figcaption class="participante"> <?php echo  $participante3[0].' '. $participante3[1]. ' '. $participante3[2]. ' '. $participante3[3]. ' '. $participante3[4]. ' '. $participante3[5] ?> </figcaption>
            </figure> 
            <figure class="figure">
                <img title ="Silueta de Persona" src="img/usuario.png" alt="imagen aseemejadora de la silueta de una persona">
                <figcaption class="participante"> <?php echo  $participante4[0].' '. $participante4[1]. ' '. $participante4[2]. ' '. $participante4[3]. ' '. $participante4[4]. ' '. $participante4[5] ?> </figcaption>
            </figure>   
       </article>
       <article>
            <figure>
                <img title ="Logo Quini6" src="img/Quini-6.png" alt="imagen aseemejadora de la silueta de una persona">
                <figcaption class="sorteo"> <?php echo  $sorteo[0].' '. $sorteo[1]. ' '. $sorteo[2]. ' '. $sorteo[3]. ' '. $sorteo[4]. ' '. $sorteo[5] ?> </figcaption>
            </figure>
            <?php 
            echo '<p>Participante 1: <strong>' . $aciertosParticipante1 . ' aciertos </strong></p>'; 
            echo '<p>Participante 1: <strong>' . $aciertosParticipante2 . ' aciertos </strong></p>';
            echo '<p>Participante 1: <strong>' . $aciertosParticipante3 . ' aciertos </strong></p>';
            echo '<p>Participante 1: <strong>' . $aciertosParticipante4 . ' aciertos </strong></p>';
            ?> 
        </article>
    </section>
</main>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--> 
<?php
    require('html/pie.html');//introduzco la parte del pie de mi paguina 
?> 
