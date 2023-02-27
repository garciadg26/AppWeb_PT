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

    <!-- Contenedor -->
    <div class="cont_flex">
        <!-- Aside -->
        <aside id="cont_aside">
            <?php include_once __DIR__ . "/../../Template/asideMenu.php"; ?>
            <?php include_once __DIR__ . "/../../Template/asideFooter.php"; ?>
        </aside>
        <!-- Panel principal -->
        <div id="cont_panel_principal_fijo">
            <?php include_once __DIR__ . "/../../Template/menuSuperior.php"; ?>
            <!-- Panel central -->
            <div id="panel_central">
                <div class="titulo_panel">
                    <h4 class="tit_2">CONSULTAR : CATEGORÍA</h4>
                </div>
                <!-- Panel central único -->
                <div class="panel_central_unico">
                    <div class="cont_titulo_cursos">
                        <h3 class="tit_3">CATEGORÍA</h3>
                        <a class="btn_general btn_principal btn_icon_right" href="<?php echo constant('URL') . 'altaCategoria'?>">CREAR NUEVA CATEGORÍA<i class="btn_icon icon_flecha"></i></a>
                    </div>
                    <a href="<?php //echo constant('URL') . 'altaCurso'?>"></a>
                
                    <table id="tabla_panel_categoria" class="tabla_panel">
                        <thead class="titulo_tabla_panel">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Actualizar</th>
                                <th>Borrar</th>
                            </tr>
                        </thead>
                        <tbody class="cuerpo_tabla_panel">
                            <?php
                                //Importamos libreria de la clase curso  
                                include_once 'App/Models/curso.php';
                                //var_dump($this->$cursos);
                                //$cursos = [];
                                //$cursos = $user->consultarCurso();
                                foreach($this->categorias as $row){
                                    $categorias = new Curso();
                                    $categorias = $row; 
                            ?>
                            <tr>
                                <th><?php echo $categorias->idCa; ?></th>
                                <th><?php echo $categorias->nombreCa; ?></th>
                                <th><a class="btn_general btn_editar btn_icon_right" href="<?php echo constant('URL') . 'categoria/verCategoria/'  . $categorias->idCa ?>">EDITAR<i class="btn_icon icon_editar"></i></a></th>
                                <th><a class="btn_general btn_eliminar btn_icon_right" onclick="return confirmEliminar()" href="<?php echo constant('URL') . 'categoria/eliminarCategoria/'  . $categorias->idCa ?>">ELIMINAR<i class="btn_icon icon_eliminar"></i></a></th>
                            </tr>
                            <?php
                                } //Termina el ciclo Foreach  
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </div>
    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
</body>
</html>