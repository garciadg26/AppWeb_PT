

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php include_once __DIR__ . "/../header.php"; ?>
    <h2>Sección de Nuevo</h2>
    <form action="<?php echo constant('URL'); ?>nuevo/regisAlu" method="POST">
        <p>
            <label for="matricula">Matricula</label><br>
            <input type="text" name="matricula" id="">
        </p>
        <p>
            <label for="nombre">Nombre</label><br>
            <input type="text" name="nombre" id="">
        </p>
        <p>
            <label for="apellido">Apellido</label><br>
            <input type="text" name="apellido" id="">
        </p>
        <p>
            <input type="submit" value="Registrar alumno">
        </p>
    </form>
    <?php include_once __DIR__ . "/../footer.php"; ?>
</body>
</html>