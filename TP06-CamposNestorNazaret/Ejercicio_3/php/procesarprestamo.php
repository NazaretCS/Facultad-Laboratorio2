<?php 
    $ruta = '../css';
    require_once('../html/encavezado.html');  
    if (!empty($_POST['DNI']) && !empty($_POST['cantidad'])) {
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $fecha = date('Y-m-d  H:i:s');
        //echo $fecha;
        $_POST['fecha']=$fecha;
        $linea = implode(';',$_POST);
        //echo  '<p>' .$linea. '</p>';
        $carpeta = '../txt/';
        if (!file_exists($carpeta)) {
            mkdir($carpeta);
        }
        $nombreArchivo='prestamos.txt';
        $archivo = fopen($carpeta.$nombreArchivo,'a');
        fputs($archivo, $linea . PHP_EOL);
        fclose($archivo);
        
        

        echo'<main><article><p> Prestamo generado con Exito </article></main></p>';
        header ('refresh:6; url=../index.php');
    } else {
        echo '<main><article><p> Faltaron completar algunos campos</p></article></main>';
        header ('refresh:6; url=prestamo.php');  /*Redirecciono la paguina hacia mi proce*/
    }
?>
    
<?php 
    require_once('../html/pie.html');
?>