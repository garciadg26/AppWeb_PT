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
                                <th>Nombre</th>
                                <th>Fecha (Mes/Día/Año)</th>
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
                                    $fechaC = $categorias->fechaCa;
                                    $fechaN = date("F j, Y", strtotime($fechaC));
                            ?>
                            <tr>
                                <td><?php echo $categorias->nombreCa; ?></td>
                                <td><?php echo $fechaN; ?></td>
                                <td><a class="btn_general btn_editar btn_icon m0-auto" href="<?php echo constant('URL') . 'categoria/verCategoria/'  . $categorias->idCa ?>">EDITAR
                                    <img src="Public/Assets/images/svg/icono_editar_botones.svg" alt="">
                                </a></td>
                                <td><a class="btn_general btn_eliminar btn_icon m0-auto" onclick="return confirmEliminar()" href="<?php echo constant('URL') . 'categoria/eliminarCategoria/'  . $categorias->idCa ?>">ELIMINAR
                                    <img src="Public/Assets/images/svg/icono_eliminar_botones.svg" alt="">
                                </a></td>
                            </tr>
                            <?php
                                } //Termina el ciclo Foreach  
                            ?>
                        </tbody>
                    </table>
                    <p id="Error_filtro_vacio">Contenido vacio</p>
                    <div class="cont_paginacion">
                        <a href="javascript:prevPage()" id="btn_prev">Atras</a>
                        <a href="javascript:nextPage()" id="btn_next">Siguiente</a>
                        <p>páginas:</p>    
                        <span id="page"></span>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
    <script type="text/javascript" src="<?php echo constant('URL'); ?>Public/Assets/js/sortTable.js?ver=1.1.12"></script>
    <script type="text/javascript" src="<?php echo constant('URL')?>Public/Assets/js/paginacionCategoria.js?ver1.1.11"></script>
    <script>
    window.addEventListener("load", function(){      
        ordenarTabla("tabla_panel_categoria", null, "sortable");
    });
    </script>
</body>
</html>