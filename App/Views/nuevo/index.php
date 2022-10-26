

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> -->

    <?php include_once __DIR__ . "/../../Includes/head.php"; ?>
    <?php include_once __DIR__ . "/../../Includes/header.php"; ?>
    <h2>Sección de Nuevo</h2>
    <a href="<?php echo constant('URL'); ?>App/Includes/logout.php">Cerrar sesión</a>
    <form action="<?php echo constant('URL'); ?>nuevo/regisAlu" method="POST">
        <p>
            <label for="acercaDe">Acerca del curso</label><br>
            <input type="text" name="acercaDe" id="" required>
        </p>
        <p>
            <label for="queAprenderas">¿Qué aprenderas?</label><br>
            <input type="text" name="queAprenderas" id="" required>
        </p>
        <p>
            <label for="paraQuien">¿Para quién esta dirigido?</label><br>
            <input type="text" name="paraQuien" id="" required>
        </p>
        <p>
            <input type="submit" value="Registrar alumno">
        </p>
    </form>
    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
</body>
</html>