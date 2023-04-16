    <?php
        include_once "App/Includes/userInfo.php";
    ?>
    <ul id="menu_aside">
        <?php ?>
        <li class="logitipo_aside">
            <img src="<?php echo constant('URL')?>Public/Assets/images/Logotipo_IAM.png" alt="">
        </li>
        <a href="<?php echo constant('URL'); ?>main" class="btn_menu_aside <?php if($posIamMain !== false || strcmp($url, $iam) == 0) echo 'active'; ?> ">
            <li class="lista_aside lista_aside_hover"><i class="icon_menu_aside icon_ms_1"></i>
    <?php //ADMINISTRADOR
        if($userTipo == 1){
            ?>
            Panel de administración
    <?php } //ALUMNO
    else { ?>
            Panel de inicio
    <?php } ?>
            </li>
        </a>
    <?php //ADMINISTRADOR
        if($userTipo == 1){ ?>
        <li class="btn_menu_aside lista_aside_hover <?php if($posConsulta !== false || $posaltaCurso !== false || $poscategoria !== false || $posaltaCategoria !== false) echo "active"; ?>">
            <div class="lista_aside" id="menu-button">
                <i class="icon_menu_aside icon_ms_5"></i>Academía
            </div>
            <div id="submenu" class="submenu_gen">
                <a href="<?php echo constant('URL'); ?>consulta" class="lista_aside lista_aside_hover <?php if($posConsulta !== false || $posaltaCurso !== false) echo "active_submenu" ?>"> Cursos</a>
                <a href="<?php echo constant('URL'); ?>categoria" class="lista_aside lista_aside_hover <?php if($poscategoria !== false || $posaltaCategoria !== false) echo "active_submenu" ?>"> Categoría</a>
            </div>
        </li>
    <?php } else if($userTipo == 2){ ?>
        <a href="#" class="btn_menu_aside">
            <li class="lista_aside">
                <i class="icon_menu_aside icon_ms_5"></i>Mis Cursos
            </li>
        </a>    
    <?php } ?>
    <?php //ADMINISTRADOR
        if( $userTipo == 1){ ?>
        <a href="<?php echo constant('URL') ?>alumnos" class="btn_menu_aside <?php if($posAlumnos !== false) echo "active"; ?>">
            <li class="lista_aside lista_aside_hover">
                <i class="icon_menu_aside icon_ms_2"></i>Alumnos</li>
        </a>

        <!-- <a href="#" class="btn_menu_aside">
            <li class="lista_aside"><i class="icon_menu_aside icon_ms_3"></i>Instructores</li>
        </a> -->

    <?php }?>
     
        <!-- <a href="#" class="btn_menu_aside">
            <li class="lista_aside"><i class="icon_menu_aside icon_ms_4"></i>Grupos</li>
        </a> -->
        
        <a href="#" class="btn_menu_aside">
            <li class="lista_aside"><i class="icon_menu_aside icon_ms_7"></i>Plantel</li>
        </a>
        <a href="#" class="btn_menu_aside">
            <li class="lista_aside"><i class="icon_menu_aside icon_ms_8"></i>Equipos de cómputo</li>
        </a>
        <hr>
        <a href="<?php echo constant('URL') ?>usuario" class="btn_menu_aside <?php if(strpos($url, $usuario) !== false) echo "active"; ?>">
            <li class="lista_aside lista_aside_hover">
                <i class="icon_menu_aside icon_ms_11"></i>Mi cuenta
            </li>
        </a>
        <a href="#" class="btn_menu_aside">
            <li class="lista_aside"><i class="icon_menu_aside icon_ms_9"></i>Reportes</li>
        </a>
        <a href="<?php echo constant('URL'); ?>App/Includes/logout.php" class="btn_menu_aside">
            <li class="lista_aside lista_aside_hover"><i class="icon_menu_aside icon_ms_10"></i>Cerrar sesión</li>
        </a>
    </ul>
