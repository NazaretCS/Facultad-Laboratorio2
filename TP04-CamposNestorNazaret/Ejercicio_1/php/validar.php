<?php
    $ruta = '../ccs'; //Le doy a la variable ruta ese valor para que , al momento de reemplazarla me tome la direccion del arhivo estilo.css
    require('../html/encavezado.html');
    
    //var_dump($_POST);
?> 
    <main>
        <article>
<?php

    
    if (!empty($_POST['apellido']) && !empty($_POST['nombre']) && !empty($_POST['usuario']) && !empty($_POST['contraseña']) && !empty($_POST['tipo'])) {

        /*
        echo '<h2>apellido:</h2>';
        echo '<p>' . $_POST['apellido'] . '</p>';
        echo '<h2>Nombre: </h2>'; 
        echo '<p>' . $_POST['nombre'] . '</p>';
        echo '<h2>Usuario: </h2>'; 
        echo '<p>' . $_POST['usuario'] . '</p>';
        echo '<h2>contraseña: </h2>'; 
        echo '<p>' . $_POST['contraseña'] . '</p>';
        echo '<h2>contraseña: </h2>'; 
        echo '<p>' . $_POST['tipo'] . '</p>';
        $columnas = $_POST['contraseña'];
        */


        
    echo '<h2>Lista de usuarios reguistrados:</h2>';
    
         ?> <!-- Muestro una pequeña tabla con la información recaudada -->
         <table>
             <th>Usuario</th>
             <th>Apellido</th>
             <th>Nombre</th>
             <th>Tipo</th>
            <tr>
                <td> <?php echo $_POST['usuario'] ?> </td>
                <td> <?php echo $_POST['apellido'] ?> </td>
                <td> <?php echo $_POST['nombre'] ?> </td>
                <td> <?php echo $_POST['tipo'] ?> </td>
            </tr>
         </table>

         <?php 
         
    
    

    } else { 
        echo '<p>Faltaron llenar algunos campos</p>';
        
    }


    
    ?>
        </article>
    </main>
<?php
    

 require('../html/pie.html'); 
?>