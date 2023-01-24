<?php

/*+++++++++++++++++++++++++++++++++++++  Defino mi Procedimiento Mostrar +++++++++++++++++++++++++++++++++++*/
    function mostrar($carta,$palo) 
    {
        $a = array_rand($carta); //tomo de manera aletorea un elemento de los arreglos
        $b = array_rand($palo);

        echo '<p>Naipe Varajado</p>';
        echo '<img src="img/'. $carta[$a] .'-'. $palo[$b] .'.jpg" >'; //genero la url de la imagen atravez de los elementos aleatoreamente generados.
        
    
    }
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/ 
    
?>

