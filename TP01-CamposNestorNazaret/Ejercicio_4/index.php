<?php
    include ("html/encavezado.html");//introdusco la parte del codigo correspondiente a el encabezado

//----------------En esta sección declaro/inicializo las variables y constantes---------------
    const IVA = 0.21;
    const DESCUENTO = 0.15;
    $minRand = 10;
    $maxRand = 1000;
    $totalSinIva = 0;
    $totalConIva = 0;
    $totalConDescuento = 0;
//-------------------------------------------------------------------------------------------


//----En esta seccion asigno los resultados de los calculos correspondientes a sus devidas variables---
    $primerProducto=mt_rand($minRand*10, $maxRand*10)/10;
    $segundoProducto= mt_rand($minRand*10, $maxRand*10)/10;
    $totalSinIva = $primerProducto + $segundoProducto;
    $totalConIva = $totalSinIva + ($totalSinIva * IVA);
    $totalConDescuento = $totalConIva - ($totalConIva * DESCUENTO);
//-----------------------------------------------------------------------------------------------------


//-En esta seccion muestro en mi paguina las variables con sus respectivos datos ya cargados, convinandolas con texto---------------------------------------------------------------------
    echo '<p>----------- SIMULACIÓN DE COMPRAS ------------</p>';
    echo '<p> Valor de IVA: 21%<br>';
    echo 'Valor de DESCUENTO: 15%</p>';

    echo '<p> Valor del primer producto sin  IVA: $'. $primerProducto . '<br>' ;
    echo 'Valor del segundo producto sin IVA: $'  .$segundoProducto. '</p>';
    

    echo '<p> Total sin IVA: $' ,number_format($totalSinIva, 1, ',', '.'). '<br>';
    echo 'Total aplicando IVA: $', number_format($totalConIva, 1, ',','.'). '</p>';

    echo '<p>Total aplicando Descuento del 15%: $' ,  number_format($totalConDescuento, 1, ',','.'). '</p>';
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    include("html/pie.html"); //incluyo la estructura inferior de mi paguina-----------
?>   

<!--Modifique de esta manera el codigo porque es di mi agrado tener las partes bien separadas, tambien me gusta hacer todos los calculos y asignaciones posibles primero y luego emepezar a mostrar  (en la medida de lo posible...)-->

