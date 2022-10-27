<?php
    //Soluciona las sesiones para consultar el nombre EN LOS ESTAOD 
    include_once 'App/Includes/user_session.php';
    include_once 'App/Includes/user.php';
    
    $userSession = new UserSession();
    $user = new User();
    $user->setUser($userSession->getCurrentUser());
    
    /*COMPROBACION DE ROLES
    //Comprobar si el usuario NO inicio sesion
    if(!isset($_SESSION['rol'])){
        header("Location:../../../iam");
    }else{
        //Comprobamos si el usuario NO es ADMINISTRADOR
        if($_SESSION['rol'] != 1){
            header("Location:../../../iam");
        }
    }*/

?>


    <?php include_once __DIR__ . "/../../Includes/head.php"; ?>
    <?php include_once __DIR__ . "/../../Includes/header.php"; ?>
    <h2>Sección de consulta</h2>
    <h3>Bienvenido <?php echo $user->getNombre(); ?></h3>
    <a href="../iam/App/Includes/logout.php">Cerrar sesión</a>
    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
</body>
</html>