<?php
    require('html/encavezado.html'); //introdusco la parte del encabezado de mi paguina

    //-------------------declaro/inicializo las variables y constantes que usare--------------
        $nombre = 'Campos Nazaret';
        $primerValor = 4000;
        $segundoValor = 6000;
        $incrementoTitulo= 0;
        $descuentoAporteJuvilatorio = 0;
        $descuentoObraSocial = 0;
        $sueldoNeto= 0;
        $sueldoBruto = mt_rand($primerValor, $segundoValor);
        const APORTE_JUBILATORIO = 13;
        const OBRA_SOCIAL = 3.5;
        const TITULO = 10;
    //mediante la funcion mt_rand establesco que la variable dolaresComprar tenga un valor, el cual se uvicara entre los valores de primerValor y segundoValor
    //-----------------------------------------------------------------------------------------    
        
        
    //-------Realizo las operaciones y asignaciones nesesarias de acuerdo con la problematica------    
        $incrementoTitulo = $sueldoBruto + (($sueldoBruto*TITULO)/100);
        $descuentoAporteJuvilatorio = ($incrementoTitulo * APORTE_JUBILATORIO)/100;
        $descuentoObraSocial = ($incrementoTitulo * OBRA_SOCIAL)/100;
        $sueldoNeto= $sueldoBruto - $descuentoAporteJuvilatorio - $descuentoObraSocial;
    //---------------------------------------------------------------------------------------------

    echo '<h2>RECIBO DE SUELDO</h2>';

?>

<!-- En las Siguientes lineas lo que ago es conmvinar una tabla con codigo php para poder mostrar los datos obtenidos--> 
    <article>
        <table>
            <caption> Empleado/a: <?php echo $nombre ?> </caption>
            <thead>
                <th scope="col">Concepto</th>
                <th scope="col">Ingreso</th>
                <th scope="col">Descuentos</th>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">Sueldo Bruto</td>
                    <td>$<?php echo $sueldoBruto ?> </td>
                    <td></td>
                </tr>
                <tr>
                    <td scope="row">Titulo</td>
                    <td>$<?php echo $incrementoTitulo ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td scope="row">Aporte Juvilatorio</td>
                    <td></td>
                    <td>$<?php echo $descuentoAporteJuvilatorio ?></td>
                </tr>
                <tr>
                    <td scope="row">Obra Social</td>
                    <td></td>
                    <td>$<?php echo $descuentoObraSocial ?></td>
                </tr>
                <tr>
                    <td  scope="row" colspan="3" class=sueldo> <strong>Sueldo Neto: $<?php echo $sueldoNeto ?></strong></td>
                    
                </tr>
            </tbody>
        </table>
    </article>

<!-- Eleji esta manera para convinar los datos ya que, como dijo el profesor en la practica, es una manera mas clara-->
<!-- -------------------------------------------------------------------------------------------------------  -->


<?php
    require('html/pie.html');//introduzco la parte del pie de mi paguina 
?>



