

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> -->

    <?php include_once __DIR__ . "/../../Includes/headHome.php"; ?>
    <?php include_once __DIR__ . "/../../Includes/header.php"; ?>
    <h2>Sección de Nuevo</h2>
    <h3>Bienvenido <?php echo $user->getNombre(); ?></h3>
    <a href="<?php echo constant('URL'); ?>App/Includes/logout.php">Cerrar sesión</a>



    <table width="50%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Costo</th>
            </tr>
        </thead>
        <tbody>
            <?php
                //Importamos libreria de la clase curso  
                
                include_once 'App/models/curso.php';
                $cursos = [];
                $cursos = $user->consultarCurso();
                foreach($cursos as $row){
                    $cursos = new Curso();
                    $cursos = $row; 
                
            ?>
            <tr>
                <td><?php echo $cursos->nombreC; ?></td>
                <td><?php echo $cursos->costoC; ?></td>
            </tr>
            <?php
                }//Termina el ciclo Foreach  
            ?>
        </tbody>
    </table>


    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
</body>
</html>