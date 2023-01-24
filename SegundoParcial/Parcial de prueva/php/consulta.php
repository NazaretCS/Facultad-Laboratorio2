<?php
require '../html/cabecera.html';
require '../html/menu.html';
?>

<main>
    <h2>Consulta</h2>
    <form action="sesion.php" method="POST">
        <label for="nombre">Nombre del paciente</label>
        <input type="text" name="nombre" id="nombre" maxlength="100" required><br>
        <label for="telefono">Teléfono</label>
        <input type="tel" name="telefono" id="telefono" maxlength="10" required><br>
        <input type="submit" value="Consultar">
    </form>
</main>

<?php
require '../html/pie.html';
?>