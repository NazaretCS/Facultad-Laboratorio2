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
        require ('conexion.php');
        $bd = 'peliculas';
        $conexion = conectar($bd);

        $usuario = $_POST['usuario'];
        $clave = sha1($_POST['contraseña']);
        $consulta = 'SELECT usuario, password
                     FROM usuario
                     WHERE usuario = \''. $usuario .'\' AND password = \''. $clave .'\' ';
        //echo $consulta;  //mostrar la consulta siempre ayuda a encontrar errores
        
        
        $q = mysqli_query($conexion, $consulta);
        if ($q){   // mysqli_query() me devolvera un booleano, por lo tanto me sera mas facil saber si la consulta fue exitosa o no.
            if (mysqli_num_rows($q)) {   //Este if me tomara como falso unicamente en el caso de que el numero de filas sea igual cero.
                //echo '<p>Trajo Algo</p>';
                header ('refresh:0; url=usuario_listado.php');
            } else {
                echo '<p>No se encontro al usuario</p>';
                header ('refresh:5; url=../index.html');
            }
        } else {
            echo '<p>Error en la consulta</p>';
        }
        
        desconectar($conexion);

        




        
     
    } else { 
        echo '<p>Faltaron llenar algunos campos</p>';
        
    }


    
?>
        </article>
    </main>
<?php
    

 require('../html/pie.html'); 
?>