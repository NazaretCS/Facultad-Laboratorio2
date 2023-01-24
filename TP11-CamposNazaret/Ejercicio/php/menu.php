
    
<?php

     /*------------------   MENÚ DE NAVEGACIÓN   ------------------*/ ?>  
    
    <figure class="imagenDeUsuario">
        <?php 
        if ($_SESSION['foto'] == '') {
            
            if ($_SESSION['tipo'] == 'Administrador') {
                ?> <img src="../img/usuarios/admin.jpg" alt="foto de portada de un administrador"><?php
            } else {
                ?> <img src="../img/usuarios/usuario_default.png" alt="foto del usuario logeado"><?php
            }
        } else { ?>
            <img src="../img/usuarios/<?php echo $_SESSION['foto'];?>" alt="foto del usuario logeado"> <?php
        } ?>
        <figcaption><p>    <?php echo $_SESSION['usuario'];?> |   <a href="cerrar_session.php" >CerrarSeseión</a></p></figcaption>
    </figure>
    <hr class="separadorDelUsuario">
    <nav>
        <h3>Usuarios</h3>
        <ul>
            <?php
                if($_SESSION['tipo'] == 'Administrador') {
                    echo '<li><a href="usuario_alta.php">Nuevo Usuario</a> </li>';
                }
            ?>            
            <li><a href="usuario_listado.php">Listado Usuarios</a></li>
        </ul>
        <h3>Peliculas</h3>
        <ul>
            <?php
                if($_SESSION['tipo'] == 'Administrador') {
                    echo '<li><a href="pelicula_alta.php">Agregar Pelicula</a> </li>';
                }
            ?>             
            <li><a href="pelicula_listado.php">Listar Pelicula</a> </li>
            <li><a href="pelicula_favoritaLista.php">Listar Favorita</a> </li>
        </ul>
        <h3>Operaciones</h3>
        <ul>
            <li><a href="contactenos.php">Contactenos</a></li>
            <li><a href="configuracion.php.php">Configuración</a></li>
        </ul>
    </nav>

<?php /*-----------------------------------------------------------*/ ?>  