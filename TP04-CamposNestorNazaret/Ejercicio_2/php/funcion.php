<?php
 
function aleatoreoSinRepetir($cantidad, $desde, $hasta)
{
    $arreglo = [];
    
    for ($i=0; $i < $cantidad ; $i++) { 
        do {
            $numero = mt_rand($desde,$hasta);

        } while (in_array($numero,$arreglo));
        $arreglo[] = $numero;
    }
    
    return $arreglo;

}

?>
