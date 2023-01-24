<?php
    $ruta = '../ccs'; //Le doy a la variable ruta ese valor para que , al momento de reemplazarla me tome la direccion del arhivo estilo.css
    require('../html/encavezado.html');
    
    
?> 
    <main>
        
<?php

    
    if (!empty($_POST['apellido']) && !empty($_POST['nombre']) && !empty($_POST['usuario']) && !empty($_POST['contraseña']) && !empty($_POST['tipo']) && !empty($_FILES['foto']['size']) ) {

    //echo '<h2>Lista de usuarios reguistrados:</h2>';
        

        $origen = $_FILES['foto']['tmp_name'];
        $destino = '../img/'.$_POST['apellido'].'.jpg';
        if (!move_uploaded_file($origen, $destino)){
            echo 'No se pudo subir la imagen';
        } else{
            //echo 'la imaguen se subio con exito';
        }
        //var_dump($_FILES);

        $fecha = date_create($_POST['fechaNac']);
        $fechaFormato = date_format($fecha, 'd-F');

         ?> 


        <article class="flex">
            <figure class="principal">
                <img src="../img/<?php echo $_POST['apellido'] ?>.jpg " alt="imagen de usuario">
            </figure>
            <?php  echo '<p class="nombre"><strong>' .$_POST['apellido'] . ', ' . $_POST['nombre']. '</strong></p>' ?>
        </article>

        <article class="flex">
            <figure class="figra">
                <img src="../img/usuario.png" alt="">
            </figure>
            <p >Usuario: <strong> <?php echo $_POST['apellido'].' ('.$_POST['tipo'].') '?> </strong></p>  
        </article>

        <article class="flex">
            <figure class="figra">
                <img src="../img/torta.png" alt="torta">
            </figure>
            <p> Cumapleaños: <strong><?php echo $fechaFormato?></strong></p>
        </article>

         <?php 

    } else { 
        echo '<p>Faltaron llenar algunos campos</p>';
        
    }

    ?>
        
    </main>
<?php
    

 require('../html/pie.html'); 
?>