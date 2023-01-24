<?php

    include("html/encavezado.html");//introdusco la parte del codigo correspondiente a el encabezado

   
    $tarifas = ['motos' => 50, 'autos' => 90, 'camionetas' =>110 ]; //Creo mi arreglo
    const CAPACIDAD = 600;
    const TIEMPO = 2;
    
   
    //Inicializo mis variables.
    $motos= 0;
    $autos= 0;
    $camionetas= 0;
    $recaudacionMotos = 0;
    $recaudacionAutos = 0;
    $recaudacionCamionetas = 0;
    $totalRecaudacion = 0;

    //mediante la esctructura For sieguiente lo que are sera, mientras mi variable $i sea menor que la capacidad, sacar un vehiculo al azar de mi matriz que luego mediante la estructura segun realizara las operaciones nesesarias... 
    for ($i=0; $i <  CAPACIDAD; $i++) { 
       switch (array_rand($tarifas)) {
           case 'motos':
               $recaudacionMotos += ($tarifas['motos'] * TIEMPO);
               $motos++;
               break;
           
           case 'autos':
               $recaudacionAutos += ($tarifas['autos'] * TIEMPO);
               $autos++;
               break;

            case 'camionetas':
               $recaudacionCamionetas += ($tarifas['camionetas'] * TIEMPO);
               $camionetas++;
               break;
        }
    }
    $totalRecaudacion = $recaudacionMotos + $recaudacionAutos + $recaudacionCamionetas;
?>    

<main>
    <h2 class="titulo">Recaudación Estacionamiento</h2>
    <article>
        <hr>
        <p> <strong>Cantidad de Motos:</strong> <?php echo $motos ?>. Recaudación: <strong>$ <?php echo $recaudacionMotos ?> </strong></p> 
        <p> <strong>Cantidad de Autos:</strong> <?php echo $autos ?>. Recaudación: <strong> $ <?php echo $recaudacionAutos ?> </strong></p>
        <p> <strong>Cantidad de Camionetas:</strong> <?php echo $camionetas ?>. Recaudación: <strong>$ <?php echo $recaudacionCamionetas ?> </strong></p>
        <hr>

        <p class="especial"> <strong>Total de Vehiculos: <?php echo  CAPACIDAD ?> </strong></p>
        <p class="especial"><strong>Recaudacion del Día: $ <?php echo $totalRecaudacion ?></strong></p>
    </article>
</main>



<?php
    include("html/pie.html"); //incluyo la estructura inferior de mi paguina-----------
?>   

