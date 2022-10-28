<?php
    //Soluciona las sesiones para consultar el nombre EN LOS ESTADO
    /* 
    include_once 'App/Includes/user_session.php';
    include_once 'App/Includes/user.php';
    
    $userSession = new UserSession();
    $user = new User();
    $user->setUser($userSession->getCurrentUser());
    */
    
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
    
    <a href="<?php echo constant('URL') . 'altaCurso'?>">Crear nuevo curso</a>
    <a href="<?php //echo constant('URL') . 'altaCurso'?>"></a>

    <table width="50%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Costo</th>
                <th>Duración</th>
                <th>Categoría</th>
                <th>Tipo</th>
                <th>Software</th>
                <th>A</th>
                <th>E</th>
            </tr>
        </thead>
        <tbody>
            <?php
                //Importamos libreria de la clase curso  
                include_once 'App/models/curso.php';
                
                foreach($this->cursos as $row){
                    $cursos = new Curso();
                    $cursos = $row; 
                
            ?>
            <tr>
                <td><?php echo $cursos->nombreC; ?></td>
                <td><?php echo $cursos->costoC; ?></td>
                <td><?php echo $cursos->duracionC; ?></td>
                <td><?php echo $cursos->categoriaC; ?></td>
                <td><?php echo $cursos->tipoC; ?></td>
                <td><?php echo $cursos->softwareC; ?></td>
                <th><a href="<?php echo constant('URL') . 'consulta/verCurso/'  . $cursos->idC ?>">Actualizar</a></th>
                <th><a onclick="return confirmEliminar()" href="<?php echo constant('URL') . 'consulta/eliminarCurso/'  . $cursos->idC ?>">Eliminar</a></th>
            </tr>
            <?php
                }//Termina el ciclo Foreach  
            ?>
        </tbody>
    </table>
    
    <a href="../iam/App/Includes/logout.php">Cerrar sesión</a>
    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
    <script type="text/javascript">
        function confirmEliminar(){
            var respuesta = confirm("¿Estas seguro que deseas ELIMINAR el curso?")
            if(respuesta == true){
                return true;
            }else{
                return false;
            }
        }
    </script>
</body>
</html>