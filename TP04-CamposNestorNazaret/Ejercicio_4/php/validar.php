<?php
    $ruta = '../css';
    require('../html/encavezado.html');
    
?> 
    <main>
        <article>
<?php

    
    if (!empty($_POST['usuario']) && !empty($_POST['contraseña'])) {
        
        echo '<p> <strong>Usuario: </strong>' .$_POST['usuario'].'</p>';
        echo '<p> <strong>Contraseña: </strong>' .$_POST['contraseña'].'</p>';
     
    } else { 
        echo '<p>Faltaron llenar algunos campos</p>';
        
    }


    
?>
        </article>
    </main>
<?php
    

 require('../html/pie.html'); 
?>