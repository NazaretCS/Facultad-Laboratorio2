<?php
     $ruta = '../css';
    require '../html/cabecera.html';
    require '../html/menu-secundario.html';
?>

<main>
    <h2>Configurar por Máquina</h2>
    <form action="crear-cookie.php" method="POST">
        <label for="num">Elegir número de máquina</label>
        <input type="number" id="num" name="numero" min="1">
        <input type="submit" value="Guardar">
    </form>
</main>
</body>
</html>