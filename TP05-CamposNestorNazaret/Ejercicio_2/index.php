<?php
    require_once('html/encavezado.html')
?>
    <main>
        <article>
            <table>
                <caption>Listado de Cursos Disponibles</caption>
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Curso</th>
                        <th>Disertante</th>
                        <th>Fecha de Inicio</th>
                        <th>Inscripción</th>
                    </tr>
                    <tbody>
                        
                    

<?php



$carpeta = 'txt';
$nombre_archivo = 'cursos.txt';
$archivo = fopen($carpeta."/".$nombre_archivo, 'r');   


while (!feof($archivo)) { 
    $linea = fgets($archivo); 
    $lineaArray = explode(';',$linea);
    
    echo '<hr>';
    ?>
    <tr>
        <td> <img src="img/<?php echo $lineaArray[4] ?> ." ></td>
        <td><?php echo $lineaArray[0] ?></td>
        <td><?php echo $lineaArray[1]?></td>
        <td><?php echo $lineaArray[2]?></td>
        <?php if ($lineaArray[3] === 'Sin Cupos') {
           echo '<td class="sinCupos">' .$lineaArray[3].'</td>';
        } else {
            echo '<td>' .$lineaArray[3]. '</td>';
        }?>
    </tr>
    <?php
}

fclose($archivo);

 
?>
                    </tbody>
                </thead>
            </table>
        </article>
    </main>

<?php
require_once('html/pie.html');
?>