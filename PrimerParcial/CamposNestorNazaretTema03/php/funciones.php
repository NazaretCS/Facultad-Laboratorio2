<?php
    
    function precioFinal ($precio)
    {
        $aux= ($precio*20)/100;
        $calculo = $precio + $aux;
        return $calculo;
    }


    function  guardar ($nombre, $artista, $precio)
    {
        
        $carpeta = '../txt/';
        $nombre = 'precioVenta.txt';
        if (!file_exists($carpeta)) {
            mkdir($carpeta);
        }
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $fecha = date('d-m-Y');
        var_dump($_POST);
        echo '<br>';
        $_POST[3]= $fecha;
        var_dump($_POST);
        echo '<br>';
        $archivo = fopen($carpeta.$nombre,'a');
        fputs($archivo,$_POST . PHP_EOL);
        fclose($archivo);

    }
?>