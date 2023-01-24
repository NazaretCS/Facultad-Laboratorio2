<?php
session_start();
if (!empty($_SESSION['usuario'])) {
    $ruta = '../css';
    require('../html/encavezado.html');
    if($_SESSION['tipo'] == 'Administrador') {
        
        

        /*------------------------------    INSERTAR USUARIOS EN LA BASE DE DATOS   ------------------------------*/
    ?> 
        <main>
        <section class="seccion">
                <article>
                    <?php
                        require('menu.php');                   
                    ?>
                    
                </article>
            <article>
    <?php
    
        if (!empty($_POST['usuario']) && !empty($_POST['clave']) && !empty($_POST['mail']) && !empty($_POST['tipo']) &&!empty( $_POST['fecha'])) {
            
            
            require ('conexion.php');
            $bd = 'peliculas';
            $conexion = conectar($bd);

            $usuario = $_POST['usuario'];
            $clave = sha1($_POST['clave']);
            $mail = $_POST['mail'];
            $fecha = $_POST['fecha'];
            $tipo = $_POST['tipo'];
            $nombre_foto = '';
            //var_dump($_FILES);
            if (!empty($_FILES['foto']['size']) ) {
                
                $arreglo_nmbre = explode('.', $_FILES['foto']['name']);
                $extencion = $arreglo_nmbre[count($arreglo_nmbre) - 1];
                $nombre_foto = $usuario .'.'.$extencion;

                $movida = move_uploaded_file($_FILES['foto']['tmp_name'], '../img/usuarios/'.$nombre_foto );
                if ($movida) {
                    echo '<p> El archivo se movio con exito</p>';
                } else {
                    echo '<p> El archivo no se movio con exito</p>';
                }
            }
            


            $consulta = 'INSERT INTO usuario (usuario, password, mail, fecha_alta, tipo, foto)
                        VALUES (\''.$usuario.'\', \''.$clave.'\', \''.$mail.'\', \''.$fecha.'\', \''.$tipo.'\', \''.$nombre_foto.'\')';
            //echo $consulta;  //mostrar la consulta siempre ayuda a encontrar errores
            
            
            $q = mysqli_query($conexion, $consulta);
            if ($q){   // mysqli_query() me devolvera un booleano, por lo tanto me sera mas facil saber si la consulta fue exitosa o no.
                echo   '<p>Insercion Exitosa</p>';
                header ('refresh:3; url=usuario_alta.php');
            } else {
                echo '<p>Error en la consulta</p>';
                header ('refresh:13; url=usuario_alta.php');
            }
            
            desconectar($conexion);    
        
        } else { 
            echo '<p>Faltaron llenar algunos campos</p>';
            header ('refresh:4; url=usuario_alta.php');
            
        }
        
    ?>
            </article>
        </section>
        </main>
    <?php
        /*--------------------------------------------------------------------------------------------------------*/

   
    } else {
    echo '<main><article><p>No tiene permiso para ingresar a esta area</p></article></main>';
    header ('refresh:3; url=pelicula_listado.php');    
    }
require('../html/pie.html');
} else {
    header ('refresh:0; url=../index.html');
}
?>