<?php
    include_once __DIR__ . "/../../Includes/head.php";
?>

    <!-- Contenedor -->
    <div class="cont_flex curso_detalle" id="panel_usuario">
        <!-- Aside -->
        <aside id="cont_aside">
            <?php include_once __DIR__ . "/../../Template/asideMenu.php"; ?>
            <?php include_once __DIR__ . "/../../Template/asideFooter.php"; ?>
        </aside>
        <!-- Panel principal -->
        <div id="cont_panel_principal_fijo">
            <?php include_once __DIR__ . "/../../Template/menuSuperior.php"; ?>
            <!-- Encabezado img -->
            <div class="encbezado_img_c_detalle" style="background-image: url(<?php echo constant('URL') . $this->curso->fotoURLC;?>);"></div>
            <!-- Panel central -->
            <div id="panel_central">
                <!-- Panel inferior -->
                <div class="panel_inferior">
                    <div class="form_general_row">
                        <!-- INFORMACIÓN CURSO -->
                        <div class="col_8">
                            <div class="panel_transparent_unico">
                                <div class="breadcrumb">
                                    <ul class="list_breadcrumb">
                                        <li class="item_breadcrumb">
                                            <a href="<?php echo constant('URL') ?>main">Academía</a>
                                        </li>
                                        <li class="item_breadcrumb">> <?php echo $this->curso->tipoC ?></li>
                                    </ul>
                                </div>
                                <div class="cont_titulo">
                                    <h1 class="tit_2"><?php echo $this->curso->nombreC; ?></h1>
                                </div>
                                <h6 class="subtit_1">Acerca de: </h6>
                                <p class="txt_base_raleway">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium atque numquam quas, explicabo id eos laboriosam sunt, modi libero accusamus delectus commodi, neque recusandae doloribus animi perspiciatis corporis perferendis expedita.</p>
                                <div class="cont_flex">
                                    <div class="card_info_curso">
                                        <img src="<?php echo constant('URL') ?>Public/Assets/images/svg/Icon-laptop.svg" alt="">
                                        <p class="txt_info_curso"><?php echo $this->curso->softwareC;?></p>
                                    </div>
                                    <div class="card_info_curso">
                                        <img src="<?php echo constant('URL') ?>Public/Assets/images/svg/Icon-clok.svg" alt="">
                                        <p class="txt_info_curso"><?php echo $this->curso->duracionC;?> hr</p>
                                    </div>
                                    <div class="card_precio_curso">
                                        <p class="txt_precio_curso">$<?php echo $this->curso->costoC;?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- INFORMACIÓN INSTRUCTOR -->
                        <div class="col_4">
                            <div class="panel_central_unico box_shadow">
                                <div class="cont_info_instructor">
                                    <img src="<?php echo constant('URL') ?>Public/Assets/images/cover-instructor.png" alt="">
                                    <div class="info_instructor">
                                        <!-- NOMBRE INSTRUCTOR -->
                                        <p class="nom_instructor">Sergio Cárdenaz Valdez</p>
                                        <p class="tag_instructor">Instructor</p>
                                    </div>
                                </div>
                                <p class="tit_info_q">¿Qué aprenderas?</p>
                                <p class="txt_info_r">Aprender a ilustrar con pinceles</p>
                                <p class="tit_info_q">¿A quén está dirigido este curso?</p>
                                <p class="txt_info_r">Niños de 8 años en adelante</p>
                                <p class="tit_info_q">¿Requisitos?</p>
                                <p class="txt_info_r">App procreate, apple pencil, ipad</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>