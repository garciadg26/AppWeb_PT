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
                    <h4 class="tit_2">CONSULTAR : EQUIPOS DE CÓMPUTO</h4>
                </div>
                <!-- Panel inferior -->
                <div class="panel_inferior">
                    <!-- PANEL DERECHO 70 -->
                    <div class="panel_central_right_70">
                        <!-- TÍTULO -->
                        <div class="cont_titulo_cursos">
                            <a class="btn_general btn_regresar btn_icon_reverse" href="<?php echo constant('URL') ?>main">
                                <img src="Public/Assets/images/svg/Icon-arrow-next.svg" alt="">
                            REGRESAR</a>
                            <p class="subtit_1">Listado de equipos</p>
                            <?php 
                                if($_SESSION['rol'] == 1){
                            ?>
                            <a class="btn_general btn_principal btn_icon" href="<?php echo constant('URL') . 'altaComputo'?>">NUEVO EQUIPO
                                <img src="Public/Assets/images/svg/Icon-arrow-next.svg" alt="">
                            </a>
                            <?php } else {
                                ?>
                            <div class="vacio"></div>
                                <?php } ?>
                        </div>
                        <!-- CARD -->
                        <div id="cont_card_cover" class="cont_card_aula">
                            <?php 
                                foreach($this->equipos as $row){
                                    $equipos = new Equipo();
                                    $equipos = $row;
                            ?>
                            <div class="card_aula">
                                <img src="<?php echo constant('URL') ?>Public/Assets/images/cover_equipos_de_computo.jpg" alt="">
                                <?php 
                                    if($_SESSION['rol'] == 1){
                                ?>
                                <a class="btn_general btn_eliminar_foto btn_icon m0-auto" onclick="return confirmEliminar()" href="<?php echo constant('URL') . 'computo/eliminarEquipo/'  . $equipos->idEqu; ?>">
                                    <img src="<?php echo constant('URL')?>Public/Assets/images/svg/icono_eliminar_botones.svg" alt="">    
                                </a>
                                <?php } ?>

                                <div class="txt_card_aula">
                                    <h5 class="nom_aula"><?php echo $equipos->nomEqu; ?></h5>
                                    <p class="txt_caption"><b>N. serie:</b> <?php echo $equipos->numSerieEqu; ?></p>
                                    <p class="txt_caption"><b>Disponible:</b> <?php echo $equipos->estatusEqu; ?></p>
                                    <?php 
                                        if($_SESSION['rol'] == 1){
                                    ?>
                                    <a class="btn_general btn_editar btn_icon" href="<?php echo constant('URL') . 'computo/verEquipo/' . $equipos->idEqu;?>">
                                        Editar
                                        <img class="img_perfil" src="<?php echo constant('URL'); ?>Public/Assets/images/svg/icono_editar_botones.svg" alt="">
                                    </a>
                                    <?php } ?>
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