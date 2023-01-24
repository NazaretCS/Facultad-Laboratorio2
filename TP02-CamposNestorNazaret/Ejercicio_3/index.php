<?php
//segun como yo lo entendi; el enunciado nos pedia hacer un programa que pudiera resolver la compra de cualquier criptomoneda, pero al no poder elejir aleatoreamente una crptomoneda se nos dio la autorizacion de nosotros asignar una mediante una variable... pero debiendo desarrollar el programa para cualquiera.

    require('html/encavezado.html'); //introdusco la parte del encabezado de mi paguina
    //
    $criptoElejida='ETH';
    $dineroDisponible=mt_rand (10000,50000);
    
    const BITCOIN = 4528602.88;
    const ETHEREUM = 298969.91;
    const CARDANO = 24414;
    const DOGECOIN = 2595;
    const PLOKADOT = 2291.50;
    const SOLANA =  7193.23;
    const FILECOIN = 6885.51;
    const THETERUS = 97.98;
 //al valor unitario de cada criptomoneda decidi ponerlo como constante, ya que si el dia de mañana actualizo mi codigo simplemente valla y lo cambie de alli al valor.

 //opte por elejir la estructura segun ya que son muchos caminos los que se pueden tomar, lo que tienen en comun estos caminos es que la variable resultado contiene cuantas monedas compramos dependiendo del valor que tome la variable $dineroDisponible y el precio de la criptomeda elejida... ademas le asigano a la variable $criptoElejida el nombre en minuscula de la moneda (ya que el problema nos especifica solicitarla mediante siglas, pero al mostrasla por pantalla es mensionada por su nombre, no por su sigla)
    switch ($criptoElejida){
        case 'BTC':
            $resultado= $dineroDisponible / BITCOIN;
            $criptoElejida='Bitcoin';
            break;
        case 'ETH':
            $resultado= $dineroDisponible / ETHEREUM;
            $criptoElejida='Ethereum';
            break;
        case 'ADA':
            $resultado= $dineroDisponible / CARDANO;
            $criptoElejida='Cardano';
            break;
        case 'DOGE':
            $resultado= $dineroDisponible / DOGECOIN;
            $criptoElejida='Dogecoin';
            break;
        case 'DOT':
            $resultado= $dineroDisponible / PLOKADOT;
            $criptoElejida='Plokadot';
            break;
        case 'SOL':
            $resultado= $dineroDisponible / SOLANA;
            $criptoElejida='Solana';
            break;
        case 'FIL':
            $resultado= $dineroDisponible / FILECOIN;
            $criptoElejida='Filecoin';
            break;
        case 'USDT':
            $resultado= $dineroDisponible / THETERUS;
            $criptoElejida='Theterus';
            break;
    }
    echo '<p class= parrafo1>Efectivo:<strong> $' .$dineroDisponible. '</strong></p>' ;
   
    echo '<p>Compraste: </p> <p class=parrafo2>' .number_format($resultado, 8, ',','.'). ' ' .$criptoElejida.  '</p>' ;
   //realizo dos echos mostrando las variables... tambien utilizo distintas clases para poder llegar a dar el formato que se muestra en el ejemplo.

    require('html/pie.html');//introduzco la parte del pie de mi paguina 
?>



