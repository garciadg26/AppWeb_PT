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
        <div id="cont_aside">
            <?php include_once __DIR__ . "/../../Template/asideMenu.php"; ?>
            <?php include_once __DIR__ . "/../../Template/asideFooter.php"; ?>
        </div>
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
                        <a class="btn_general btn_principal btn_icon_right" href="<?php echo constant('URL') . 'altaCurso'?>">CREAR NUEVO CURSO<i class="btn_icon icon_flecha"></i></a>
                    </div>
                    <a href="<?php //echo constant('URL') . 'altaCurso'?>"></a>
                
                    <table id="tabla_panel_consultar" class="tabla_panel">
                        <thead class="titulo_tabla_panel">
                            <tr>
                                <th>Nombre</th>
                                <th>Costo</th>
                                <th>Duración</th>
                                <th>Categoría</th>
                                <th>Tipo</th>
                                <th>Software</th>
                                <th>Actualizar</th>
                                <th>Borrar</th>
                            </tr>
                        </thead>
                        <tbody class="cuerpo_tabla_panel">
                            <?php
                                //Importamos libreria de la clase curso  
                                include_once 'App/models/curso.php';
                                
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
                                <th><a class="btn_general btn_editar btn_icon_right" href="<?php echo constant('URL') . 'consulta/verCurso/'  . $cursos->idC ?>">EDITAR<i class="btn_icon icon_editar"></i></a></th>
                                <th><a class="btn_general btn_eliminar btn_icon_right" onclick="return confirmEliminar()" href="<?php echo constant('URL') . 'consulta/eliminarCurso/'  . $cursos->idC ?>">ELIMINAR<i class="btn_icon icon_eliminar"></i></a></th>
                            </tr>
                            <?php
                                }//Termina el ciclo Foreach  
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