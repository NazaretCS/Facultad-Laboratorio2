<?php
    require('html/encavezado.html'); //introdusco la parte del encabezado de mi paguina

    //-------------------declaro/inicializo las variables y constantes que usare--------------
        $cotizacionDolar = '$102.50';
        $primerValor = '100';
        $segundoValor = '300';
        $subtotal= 0;
        $calculoImpuestoPais= 0;
        $calculoPercepcionGanancias= 0;
        $total= 0;
        $cotizacionDolar = 102.50;

        $dolaresComprar = mt_rand($primerValor*100, $segundoValor*100)/100 ;
        const IMPUESTO_PAIS = 30;
        const IMPUESTO_GANANCIAS = 35;
    //mediante la funcion mt_rand establesco que la variable dolaresComprar tenga un valor, el cual se uvicara entre los valores de primerValor y segundoValor
    //-----------------------------------------------------------------------------------------    
        
        
    //-------Realizo las operaciones y asignaciones nesesarias de acuerdo con la problematica------    
        $subtotal= $dolaresComprar * $cotizacionDolar;
        $calculoImpuestoPais= ($subtotal * IMPUESTO_PAIS) / 100;
        $calculoPercepcionGanancias=($subtotal * IMPUESTO_GANANCIAS) /100;
        $total= $subtotal + $calculoImpuestoPais + $calculoPercepcionGanancias;
    //---------------------------------------------------------------------------------------------

    //--------Meadiante echo muestro en mi paguina los distintos resultados convinandolos con texto-----
        echo '<h2>Ejercicio 2</h2>';
        echo '<p>Usted esta comprando <strong>U$D: $', $dolaresComprar, '</strong> </p>';
        echo '<p>Cotización Dólar: $', $cotizacionDolar, '</p>';
        echo '<p>Subtotal: $', $subtotal, '</p>';
        echo '<p>Impuesto país: $', $calculoImpuestoPais, '</p>';
        echo '<p>Percepción de Ganacias: $', $calculoPercepcionGanancias, '</p>';
        echo '<p> <strong>Total (con impuestos): $', $total, '</strong></p>';
    //--------------------------------------------------------------------------------------------------   
    
    require('html/pie.html');//introduzco la parte del pie de mi paguina 
?> 