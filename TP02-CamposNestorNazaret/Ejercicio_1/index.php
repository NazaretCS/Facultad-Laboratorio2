<?php
    require_once('html/encavezado.html');

    $minRand = 1;
    $maxRand = 12; 
    $carta1 = 0;
    $carta2 = 0;
    $resultado = 0;


    $primerCarta= mt_rand($minRand, $maxRand);
    $segundaCarta= mt_rand($minRand, $maxRand);

    if (  $primerCarta <= 12 && $primerCarta >=10 ){
        switch ($primerCarta){
            case $primerCarta==10:
                $carta1='Sota';
                break;
            case $primerCarta==11:
                $carta1='Caballo';
                break;
            case $primerCarta==12:
                $carta1='Rey';
                break;
        } //mediante este segun le asigno el nombre correspondiente a la carta en caso de que sea un 10, 11 o 12 
        $primerCarta=0.5;
    }
    else {
        $carta1=$primerCarta;
    }
    //mediante esta estructura de seleccion lo que ago es asiganarle los nombre a la carta, y ademas al estar entre 10 y 12 significa que en el juego no suma mas que medio punto, por lo cual le asigno el valor numerico de 0.5
    //las variables $primerCarta y $segundaCarta contienen los valores numericos de las cartas (para sumar los puntos). Mientras de que las variables $carta1 y $carta2 puede llegar a contener ya sea valores numericos o ser una cadena de caracteres (ya que son las variables que voy a mostrar para hacer saber que cartas salieron)

    if ( $segundaCarta<= 12 && $segundaCarta>=10 ){

        switch ($segundaCarta){
            case $segundaCarta==10:
                $carta2='Sota';
                break;
            case $segundaCarta==11:
                $carta2='Caballo';
                break;
            case $segundaCarta==12:
                $carta2='Rey';
                break;
        }
        $segundaCarta=0.5;
    }
    else{
        $carta2=$segundaCarta;
    }

    $resultado= $segundaCarta + $primerCarta;

    echo '<h2>9 y Medio</h2>';
    echo '<p> Naipe 1:<strong> ' . $carta1 . '</strong></p>';
    echo '<p> Naipe 2:<strong> ' . $carta2 . ' </strong></p>';
    if ($resultado==9.5) {
        echo '<p><strong>GANADOR</strong></p>';

    }
    else{
        echo '<p>PUNTOS OBTENIDOS:<strong> ' . $resultado . '</strong></p>';
    }
    

    require_once('html/pie.html');

?>