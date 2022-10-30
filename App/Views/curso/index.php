
    <?php include_once __DIR__ . "/../../Includes/head.php"; ?>
    <?php include_once __DIR__ . "/../../Template/header.php"; ?>
    <h2>Registrar nuevo curso</h2>
    <h3>Bienvenido <?php echo $user->getNombre(); ?></h3>
    <a href="<?php echo constant('URL'); ?>App/Includes/logout.php">Cerrar sesión</a>
    <form action="<?php echo constant('URL'); ?>nuevo/regisAlu" method="POST">
        <p>
            <label for="acercaDe">Nombre del curso</label><br>
            <input type="text" name="acercaDe" id="" required>
        </p>
        <p>
            <label for="queAprenderas">Costo del curso</label><br>
            <input type="text" name="queAprenderas" id="" required>
        </p>
        <p>
            <label for="paraQuien">Duración del curso</label><br>
            <input type="text" name="paraQuien" id="" required>
        </p>
        <p>
            <label for="paraQuien">Categoría</label><br>
            <select name="categoria" id="">
                <option value="">Seleccionar una categoría</option>
                <option value="1">Diseño digital</option>
            </select>
        </p>
        <p>
            <input type="submit" value="Registrar alumno">
        </p>
    </form>
    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
</body>
</html>