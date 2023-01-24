<?php
    $ruta = '../css';
    require('../html/encavezado.html');
    
?> 
    <main>
        <article>
<?php

    
    if (!empty($_POST['usuario']) && !empty($_POST['contrasenia'])) {
        
        
        $validado='';
        $arregloLimpio=[];
        $carpeta = '../txt/usuarios.txt';
        $archivo = fopen($carpeta, 'r');   

        while (!feof($archivo)) { 
            $linea = fgets($archivo); 
            $lineaArray = explode(';',$linea);
            $componentes = count($lineaArray);
            for ($i=0; $i < $componentes ; $i++) { 
                $palabra = trim($lineaArray[$i]);
                $arregloLimpio[$i] = $palabra; 
            }
            if ($_POST['usuario'] === $arregloLimpio[0]  &&  $_POST['contrasenia'] === $arregloLimpio[1]) {
                $validado = 1;   
            }  
        }
        if ($validado === 1) {
            ?>
                <article class="lsitado">
                    <lu>
                        <li>Alta</li>
                        <li>Listado</li>
                        <li>Configuración</li>
                    </lu>
                </article>
            <?php
        } else {
            echo '<p>DATOS INCORRECTOS</p>';
            header ('refresh:3; url=../index.html');        
        }
     
    } else { 
        echo '<p>Faltaron llenar algunos campos</p>'; 
    }


    fclose($archivo);
?>

        </article>
    </main>
<?php
    

 require('../html/pie.html'); 
?>