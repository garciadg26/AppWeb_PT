<?php
include_once 'App/Includes/user.php';
include_once 'App/Includes/user_session.php';
include_once 'App/Libs/app.php';

//$userSession = new UserSession();
$user = new User();

$app = new App();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Esta es la vista de Main</h1>

        <?php include_once __DIR__ . "/../header.php"; ?>
        <section>
            <h1>Bienvenido <?php echo $user->getNombre(); ?></h1>
            <a href="../iam/App/Includes/logout.php">Cerrar sesión</a>
        </section>
        <?php include_once __DIR__ . "/../footer.php"; ?>

</body>
</html>