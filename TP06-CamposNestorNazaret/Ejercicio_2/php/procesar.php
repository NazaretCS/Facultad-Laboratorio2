<?php
    $ruta = '../css';
    require_once('../html/encavezado.html');
    

    if (!empty($_POST['DNI'])){
        $bandera = '';
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $fechaYhora = date('d/m/Y  -  H:i');
        $ubicacionArchivo = '../txt/alumnos.txt';

        $archivo = fopen($ubicacionArchivo , 'r');
        while (!feof($archivo)) {
            $linea = fgets($archivo);
            $arregloLinea = explode(';' , $linea);
            if ($arregloLinea[0] == $_POST['DNI']) {
                $bandera = 1;
                $cantidad = count($arregloLinea)-1;
                for ($i=0; $i <= $cantidad; $i++) { 
                    $arregloCopia[$i] = $arregloLinea[$i];
                }
            } 
        }
        fclose($archivo);
        if ($bandera == 1) {
            ?>
                <main>
                    
                        <article class="articulo">
                            <figure>
                                <img src="../img/logo-facet.png" alt="Logo de la facultad de ciencias exactas de San Miguel de Tucumán">
                            </figure>
                            <h2>Facultad de Ciencias Exactas y Tecnología</h2>
                        </article>

                        <article>
                            <h3>Constancia de Alumno Regular</h3>
                            <p class="fyh"><strong>Fecha y hora de Impreción: <?php echo $fechaYhora ?></strong></p>
                            <p class="espacio"> Por la presente se deja constancia de que el alumno/a <strong> <?php echo $arregloCopia[1] ?> </strong>, DNI <strong> <?php echo $arregloCopia[0] ?>  </strong>es alumnio/a regular de la carrera <strong><?php echo $arregloCopia[2] ?></strong></p>
                            <p class="espacio"> Las autoridades de la Facultad de Ciencias exactas y Tecnología expiden la siguiente constancia para ser presentado donde corresponda. </p>
                        </article>
                    
                </main>
            <?php
        } else {
            ?>
                <main>
                    <article>
                        <p>El estudiante no se encuentra registrado</p>
                    </article>
                </main>
            <?php
            header ('refresh:8; url=../index.html');
        }
    } else {
        ?>
            <main>
                <article>
                    <p>Faltaron completar campos</p>
                </article>
            </main>
        <?php
        header ('refresh:8; url=../index.html');
    }
    
    

    require_once('../html/pie.html')
?>