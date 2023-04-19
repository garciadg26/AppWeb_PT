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
                    <h4 class="tit_2">REPORTES</h4>
                </div>
                <!-- Panel inferior -->
                <div class="form_general_row">
                    <div class="col_2"></div>
                    <div class="col_5">
                        <div class="panel_central_unico text-center">
                            <div class="cont_titulo_cursos">
                                <div class="vacio"></div>
                                <h3 class="tit_3">ALUMNOS</h3>
                                <div class="vacio"></div>
                            </div>
                            <!-- FOTO -->
                            <div class="cont_reportes_img">
                                <img src="<?php echo constant('URL') ?>Public/Assets/images/svg/microsoft-excel-icon.svg" alt="">
                            </div>
                            <br>
                            <!-- DESCARGAR -->
                            <a class="btn_general btn_download btn_icon m0-auto" href="<?php echo constant('URL') ?>alumnos/descargar">
                                DESCARGAR
                                <img src=" <?php echo constant('URL') ?>Public/Assets/images/svg/icon-download.svg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col_5">
                        <div class="panel_central_unico text-center">
                            <div class="cont_titulo_cursos">
                                <div class="vacio"></div>
                                <h3 class="tit_3">CURSOS</h3>
                                <div class="vacio"></div>
                            </div>
                            <!-- FOTO -->
                            <div class="cont_reportes_img">
                                <img src="<?php echo constant('URL') ?>Public/Assets/images/svg/microsoft-excel-icon.svg" alt="">
                            </div>
                            <br>
                            <!-- DESCARGAR -->
                            <a class="btn_general btn_download_curso btn_icon m0-auto" href="<?php echo constant('URL') ?>consulta/descargar">
                                DESCARGAR
                                <img src=" <?php echo constant('URL') ?>Public/Assets/images/svg/icon-download.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
    <script type="text/javascript" src="<?php echo constant('URL') ?>Public/Assets/js/paginacionImg.js?ver=1.1.10"></script>