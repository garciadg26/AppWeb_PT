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
                        <a class="btn_general btn_principal btn_icon" href="<?php echo constant('URL') . 'altaCategoria'?>">CREAR NUEVA CATEGORÍA
                            <img src="Public/Assets/images/svg/Icon-arrow-next.svg" alt="">
                        </a>
                    </div>
                    <a href="<?php //echo constant('URL') . 'altaCurso'?>"></a>
                
                    <table id="tabla_panel_categoria" class="tabla_panel">
                        <thead class="titulo_tabla_panel">
                            <tr id="tit_tabla">
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
                                <td><?php echo $categorias->idCa; ?></td>
                                <td><?php echo $categorias->nombreCa; ?></td>
                                <td><a class="btn_general btn_editar btn_icon" href="<?php echo constant('URL') . 'categoria/verCategoria/'  . $categorias->idCa ?>">EDITAR
                                    <img src="Public/Assets/images/svg/icono_editar_botones.svg" alt="">
                                </a></td>
                                <td><a class="btn_general btn_eliminar btn_icon" onclick="return confirmEliminar()" href="<?php echo constant('URL') . 'categoria/eliminarCategoria/'  . $categorias->idCa ?>">ELIMINAR
                                    <img src="Public/Assets/images/svg/icono_eliminar_botones.svg" alt="">
                                </a></td>
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
    <script type="text/javascript" src="<?php echo constant('URL'); ?>Public/Assets/js/sortTable.js?ver=1.1.10"></script>
    <script>
    window.addEventListener("load", function(){      
        
        createTable("tabla_panel_categoria", null, "sortable");
    });
    </script>
</body>
</html>