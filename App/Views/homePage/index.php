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
        <h1>Esta es la vista de HomePage Alumno</h1>
        <section>
            <h1>Bienvenido <?php echo $user->getNombre(); ?></h1>
            <a href="../iam/App/Includes/logout.php">Cerrar sesión</a>
        </section>
        <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>

</body>
</html>