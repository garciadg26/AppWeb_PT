<?php
    include_once __DIR__ . "/../../Includes/head.php";
?>

    <div class="cont_flex" id="panel_plantel">
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
                    <h4 class="tit_2">CONSULTAR : PLANTEL</h4>
                </div>
                <!-- Panel inferior -->
                <div class="panel_inferior">
                    <!-- PANEL IZQUIERDO 30 -->
                    <div class="panel_central_left_30 text-center">
                        <div class="cont_titulo_cursos">
                            <div class="vacio"></div>
                            <h3 class="tit_3">Plantel</h3>
                            <div class="vacio"></div>
                        </div>
                        <!-- FOTO -->
                        <div class="cont_foto_user">
                            <img src="<?php echo constant('URL') ?>Public/Assets/images/plantel_iam.png" alt="">
                        </div>
                        <br>
                        <!-- DESCRIPCIÓN -->
                        <h6 class="txt_base_raleway"><b>Ubicación</b></h6>
                        <p class="txt_base_raleway">Toluca</p>
                    </div>
                    <!-- PANEL DERECHO 70 -->
                    <div class="panel_central_right_70">
                        <!-- TÍTULO -->
                        <div class="cont_titulo_cursos">
                            <a class="btn_general btn_regresar btn_icon_reverse" href="<?php echo constant('URL') ?>main">
                                <img src="Public/Assets/images/svg/Icon-arrow-next.svg" alt="">
                            REGRESAR</a>
                            <p class="subtit_1">Listado de aulas</p>
                            <a class="btn_general btn_principal btn_icon" href="<?php echo constant('URL') . 'altaAula'?>">CREAR NUEVA AULA
                                <img src="Public/Assets/images/svg/Icon-arrow-next.svg" alt="">
                            </a>
                        </div>
                        <!-- CARD -->
                        <div id="cont_card_cover" class="cont_card_aula">
                            <?php 
                                foreach($this->aulas as $row){
                                    $aulas = new Aula();
                                    $aulas = $row;
                            ?>
                            <div class="card_aula">
                                <img src="<?php echo constant('URL') ?>Public/Assets/images/aula-portada.jpg" alt="">
                                <a class="btn_general btn_eliminar_foto btn_icon m0-auto" onclick="return confirmEliminar()" href="<?php echo constant('URL') . 'plantel/eliminarAula/'  . $aulas->idAul; ?>">
                                    <img src="<?php echo constant('URL')?>Public/Assets/images/svg/icono_eliminar_botones.svg" alt="">    
                                </a>
                                

                                <div class="txt_card_aula">
                                    <h5 class="nom_aula"><?php echo $aulas->nomAul; ?></h5>
                                    <p class="txt_caption"><b>Plantel:</b> Toluca</p>
                                    <p class="txt_caption"><b>Cap. máxima:</b> <?php echo $aulas->maxAul ?> Alumnos</p>
                                    <a class="btn_general btn_editar btn_icon" href="<?php echo constant('URL') . 'plantel/verAula/' . $aulas->idAul;?>">
                                        Editar
                                        <img class="img_perfil" src="<?php echo constant('URL'); ?>Public/Assets/images/svg/icono_editar_botones.svg" alt="">
                                    </a>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                        <br>
                        <!-- Aquí se encuentran los botones de paginación -->
                        <div id="botones"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
    <script type="text/javascript" src="<?php echo constant('URL') ?>Public/Assets/js/paginacionImg.js?ver=1.1.10"></script>