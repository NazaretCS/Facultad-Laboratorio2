<?php

    include("html/encavezado.html");//introdusco la parte del codigo correspondiente a el encabezado
    
// Establesco las variables que usara mi codigo, teniendo muy presente que es lo que nesesito (como ser el espacio en prefijo. Las constantes relleno las uso para rellenar los casos en que el numero generado para la patente tenga dos o una cifra, porque el enunciado pide que sea de 3 cifras)
    const PREFIJO='AE ';
    const RELLENO00='00';
    const RELLENO0='0';
    $numero = mt_rand(1, 999);
    //en las siguientes dos lineas realizo la misma operacion para diferentes variables. dicha operacion consite en generar dos numero aleatoreos entre 65 y 90, para luego mediante la funcion chr(-) transofrmar los valores a letras lamyusculas, ya que asi lo demanda el enunciado
    $letra1 = chr(mt_rand(65, 90));
    $letra2 = chr(mt_rand(65, 90));

    echo '<p>' .PREFIJO;
    switch ($numero){
        case $numero >=100:
                echo $numero;
                break;
        case $numero>=10 && $numero<100:
                echo RELLENO0 .$numero;
                break;
        case $numero>=0 && $numero<10:
                echo RELLENO00 .$numero;
                break;
    }
    //en las lineas anteriores mediante la estructura swich defino que si el numero no contiene 3 caracteres sera rellenado con los valores de RELLENO0 o de RELLENO00. Y en el siguiente echo aprovecho estratejicamente los espacios para poder cumplir con la consigna
    echo ' ' .$letra1.$letra2 .'</p>';

    



    include("html/pie.html"); //incluyo la estructura inferior de mi paguina-----------
?>   

