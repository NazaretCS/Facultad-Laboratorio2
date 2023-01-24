<?php
session_start();
if (!empty($_SESSION['usuario'])) {
    $ruta = '../css';
    require('../html/encavezado.html');

?>

    <main>
        <section class="seccion">
            <article>
                <?php
                    require('menu.php');
                    
                ?>
                
            </article>
            <article>
                
                <h2>Configuraciones</h2>
                <?php
                    //var_dump($_POST);
                    $expira = time() + 30 * 24 * 60 *60;
                    setcookie('estilo'.$_SESSION['usuario'], $_POST['config'], $expira);
                    echo '<p>Se guardo la seleccion con exito</p>';
                    header ('refresh:0; url=pelicula_listado.php');  
                ?>

            </article>
        </section>
    </main>

<?php
   

    require('../html/pie.html');
} else {
    header ('refresh:0; url=../index.html');
}
?>