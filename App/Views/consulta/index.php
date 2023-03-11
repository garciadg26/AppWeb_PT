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
    <?php include_once 'App/Models/curso.php';?>

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
                    <h4 class="tit_2">CONSULTAR : CURSOS</h4>
                </div>
                <!-- Panel central único -->
                <div class="panel_central_unico">
                    <div class="cont_titulo_cursos">
                        <h3 class="tit_3">CURSOS</h3>
                        <a class="btn_general btn_principal btn_icon" href="<?php echo constant('URL') . 'altaCurso'?>">CREAR NUEVO CURSOS
                            <img src="Public/Assets/images/svg/Icon-arrow-next.svg" alt="">
                        </a>
                    </div>
                    <a href="<?php //echo constant('URL') . 'altaCurso'?>"></a>
                    <!-- BUSCAR CURSO -->
                    <div class="cont_sortable">
                        <input type="text" id="buscadorINP" onkeyup="buscarTabla()" placeholder="Buscar curso...">
                        <div class="cont_sortable_select">
                            <select class="select_filter" name="department" id="selectCat">
                                <option value="null" selected="selected">Seleccionar categoria</option>
                                <!-- <option value="">Seleccionar todos</option> -->
                                <?php 
                                    foreach($this->categorias as $row)
                                    {
                                        $categorias = new Curso();
                                        $categorias = $row;
                                ?>
                                <option value="<?php echo $categorias->nombreCa; ?>"><?php echo $categorias->nombreCa; ?></option>
                                    <?php
                                    }
                                    ?>
                            </select>
                            <select class="select_filter" name="filterTipoINP" id="selectTipo">
                                <option value="null" selected="selected">Seleccionar Tipo</option>
                                <!-- <option value="">Seleccionar todos</option> -->
                                <?php 
                                    foreach($this->tipos as $row)
                                    {
                                        $tipos = new Curso();
                                        $tipos = $row;
                                ?>
                                <option value="<?php echo $tipos->nombreTi; ?>"><?php echo $tipos->nombreTi; ?></option>
                                    <?php
                                    }
                                    ?>
                            </select>
                            <select class="select_filter" name="filterSoftwareINP" id="selectSoft">
                                <option value="null" selected="selected">Seleccionar Software</option>
                                <!-- <option value="">Seleccionar todos</option> -->
                                <?php 
                                    foreach($this->softwares as $row)
                                    {
                                        $softwares = new Curso();
                                        $softwares = $row;
                                ?>
                                <option value="<?php echo $softwares->nombreSo; ?>"><?php echo $softwares->nombreSo; ?></option>
                                    <?php
                                    }
                                    ?>
                            </select>
                        </div>
                    </div>

                    <table id="tabla_panel_consultar" class="tabla_panel">
                        <thead class="titulo_tabla_panel">
                            <tr id="tit_tabla">
                                <th>Nombre</th>
                                <th>Costo</th>
                                <th>Duración</th>        
                                <th class="table-header">Categoría</th>
                                <th>Tipo</th>
                                <th>Software</th>
                                <th>Actualizar</th>
                                <th>Borrar</th>
                            </tr>
                        </thead>
                        <tbody class="cuerpo_tabla_panel">
                            <?php
                                //Importamos libreria de la clase curso  
                                //var_dump($this->$cursos);
                                //$cursos = [];
                                //$cursos = $user->consultarCurso();
                                foreach($this->cursos as $row){
                                    $cursos = new Curso();
                                    $cursos = $row; 
                            ?>
                            <tr>
                                <td><?php echo $cursos->nombreC; ?></td>
                                <td>$<?php echo $cursos->costoC; ?></td>
                                <td><?php echo $cursos->duracionC; ?>hrs</td>
                                <td><?php echo $cursos->categoriaC; ?></td>
                                <td><?php echo $cursos->tipoC; ?></td>
                                <td><?php echo $cursos->softwareC; ?></td>
                                <td><a class="btn_general btn_editar btn_icon" href="<?php echo constant('URL') . 'consulta/verCurso/'  . $cursos->idC ?>">EDITAR
                                    <img src="Public/Assets/images/svg/icono_editar_botones.svg" alt="">
                                </a></td>
                                <td><a class="btn_general btn_eliminar btn_icon" onclick="return confirmEliminar()" href="<?php echo constant('URL') . 'consulta/eliminarCurso/'  . $cursos->idC ?>">ELIMINAR
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
    <script type="text/javascript" src="<?php echo constant('URL')?>Public/Assets/js/paginacionTabla.js?ver1.1.11"></script>
    <script type="text/javascript" src="<?php echo constant('URL')?>Public/Assets/js/buscadorT.js?ver=1.1.11"></script>
    <script type="text/javascript" src="<?php echo constant('URL')?>Public/Assets/js/filtroT.js?ver=1.1.13" ></script>

</body>
</html>