
    
<?php /*------------------   MENÚ DE NAVEGACIÓN   ------------------*/ ?>  
    <figure class="imagenDeUsuario">
        <img src="../img/usuarios/<?php echo $_SESSION['foto'];?>" alt="foto del usuario logeado">
        <figcaption><p>     <?php echo $_SESSION['usuario'];?> |   <a href="cerrar_session.php" >CerrarSeseión</a></p></figcaption>
    </figure>
    <hr class="separadorDelUsuario">
    <nav>
        <h3>Usuarios</h3>
        <ul>
            <li>Nuevo Usuario</li>
            <li><a href="usuario_listado.php">Listado Usuarios</a></li>
        </ul>
        <h3>Peliculas</h3>
        <ul>
            <li><a href="pelicula_alta.php">Agregar Pelicula</a> </li>
            <li><a href="pelicula_listado.php">Listar Pelicula</a> </li>
            <li><a href="pelicula_favoritaLista.php">Listar Favorita</a> </li>
        </ul>
    </nav>

<?php /*-----------------------------------------------------------*/ ?>  