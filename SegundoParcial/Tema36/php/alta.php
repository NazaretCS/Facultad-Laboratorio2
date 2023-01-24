<?php
    require '../html/cabecera.html';
    require '../html/menu.html';
?>
    <main>
        <h3>Agregar Recaudación</h3>
        <form action="" method="" enctype="multipart/form-data">
            <label for="num">Número máquina</label>
            <input type="number" name="nro_maquina" id="num" min="1" required><br>
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha" required><br>
            <label for="hrs">Horas uso</label>
            <input type="number" name="horas_uso" id="hrs" required><br>
            <label for="recad">Recaudación</label>
            <input type="number" name="recaudacion" id="recad"required><br>
            <label for="foto">Foto PC</label>
            <input type="file" name="foto_pc" id="foto" accept="image/*" required><br>
            <input type="submit" value="Enviar">
        </form>
    </main>
</body>
</html>