    <?php include_once __DIR__ . "/../../Includes/head.php"; ?>
    <?php include_once __DIR__ . "/../../Includes/header.php"; ?>
    <h2>Actualizar curso</h2>
    <h3><?php echo $this->curso->nombreC; ?></h3>
    <h3>Bienvenido <?php echo $user->getNombre(); ?></h3>

    <a href="<?php echo constant('URL'); ?>App/Includes/logout.php">Cerrar sesión</a>
    <div><?php echo $this->mensaje; ?></div>
    <form action="<?php echo constant('URL'); ?>consulta/actualizarCurso" method="POST">
        <p>
            <label for="nombreCursoINP">Nombre del curso</label><br>
            <input type="text" name="nombreCursoINP" value="<?php echo $this->curso->nombreC; ?>" disable>
        </p>
        <p>
            <label for="costoCursoINP">Precio del curso</label><br>
            <input type="number" name="costoCursoINP" value="<?php echo $this->curso->costoC; ?>" required>
        </p>
        <p>
            <label for="duracionCursoINP">Duración del curso</label><br>
            <input type="text" name="duracionCursoINP" value="<?php echo $this->curso->duracionC; ?>" required> <p>hrs</p>
        </p>
        <p>
            <input type="submit" value="Actualizar curso">
        </p>
    </form>
    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
</body>
</html>