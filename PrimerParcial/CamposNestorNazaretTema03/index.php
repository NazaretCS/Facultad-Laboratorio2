<?php
    $ruta = 'css';
    require_once('html/encabezado.html');
?>

    <section>
        <main>
            <section>
                <article class="articulo">
                    <?php
                        
                        $ubicacionArchivo ='txt/galeria.txt';
                        $archivo = fopen ($ubicacionArchivo,'r');
                        while (!feof($archivo)) {
                            $linea = fgets($archivo);
                            if ($linea != '') {
                                $arregloLinea = explode(';',$linea);
                                //print_r($arregloLinea);
                                //echo '<br>';
                                //echo $arregloLinea[6];
                                
                                echo '<br>';
                                $arregloLinea[6]=trim($arregloLinea[6]);
                                if ($arregloLinea[6] != 'Vendido') {
                                    ?>
                                        <figure>
                                            <img src="cuadros/<?php echo $arregloLinea[4]; ?>" alt="<?php echo $arregloLinea[2]; ?>">
                                            <figcaption> <p>Esta pieza vale: <?php echo $arregloLinea[5]; ?> </p><p>Su autor es: <?php echo $arregloLinea[3]; ?></p><p>Su fecha de ingreso fue:<?php echo $arregloLinea[0]; ?></p></figcaption>
                                        </figure>
                                    <?php
                                }
                            }
                            
                        }
                        

                        fclose($archivo);
                    ?>
                </article>
            </section>
        </main>
    </section>

<?php
    require_once('html/pie.html');
?>