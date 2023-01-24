<?php 
    $ruta = '../css';
    require_once('../html/encavezado.html');  
    if (!empty($_POST['DNI'])) {
                
        $carpeta = '../txt/';
        $nombreArchivo='prestamos.txt';
        $archivo = fopen($carpeta.$nombreArchivo,'r');
        while (!feof($archivo)) {
            $linea = fgets($archivo);
            if ($linea != '') {
                $lineaSeparada = explode(';',$linea);
                $dni = $lineaSeparada[0];
                if ($dni == $_POST['DNI']) {
                    /*    Manejo las fechas, tanto para hacer el calculo, como para poder mostrarlas al final   */
                    $fechaActual = date('Y-m-d  H:i:s');
                    $fechaActual2 = date_create($fechaActual);
                    $fechaActualMostrar = date_format($fechaActual2, 'd-m-Y');

                    $fecha = $lineaSeparada[2];
                    $fechaMostrar2 = date_create($fecha);
                    $fechaMostrar =  date_format($fechaMostrar2, 'd-m-Y');

                    $enteroUno = strtotime($fechaActual);
                    $enteroDos = strtotime($fecha);
                    
                    $resta = $enteroUno - $enteroDos;
                    $dias = intdiv($resta, (3600*24));
                    
                    if ($dias == 0 ) {
                        $dias = 1;
                    }
                    $prestamo = $lineaSeparada[1];
                    $interes = ($prestamo*1.5)/100;
                    $interesFinal = $interes * $dias;
                    $pagar = $prestamo + $interesFinal;
                    ?>
                    <main>
                        <section>
                            <article>
                                <h2>Financiera "Pagas o Cobras"</h2>
                                <h3>Calculo de Deuda</h3>
                                <p>Monto del Préstamo: <strong><?php echo $prestamo ?></strong> </p>
                                <p>Fecha de solicitud: <strong><?php echo $fechaMostrar ?> </strong></p>
                                <p>Fecha Actual: <strong><?php echo $fechaActualMostrar ?></strong> </p>
                                <p>Cantidad de Dias: <strong><?php echo $dias ?></strong></p>
                                <p class="final">Monto a Pagar: <strong><?php echo $pagar ?></strong></p>
                            </article>
                        </section>
                    </main>
                    <?php
                }
                
                

            }
        }

        fclose($archivo);
        
        

        
        
    } else {
        echo '<main><article><p> Faltaron completar algunos campos</p></article></main>';
        header ('refresh:6; url=prestamo.php');  /*Redirecciono la paguina hacia mi proce*/
    }
?>
    
<?php 
    require_once('../html/pie.html');
?>