<?php
    include_once __DIR__ . "/../../Includes/head.php";

?>

    <!-- Contenedor -->
    <div class="cont_flex" id="panel_usuario">
        <!-- Aside -->
        <aside id="cont_aside">
            <?php include_once __DIR__ . "/../../Template/asideMenu.php"; ?>
            <?php include_once __DIR__ . "/../../Template/asideFooter.php"; ?>
        </aside>
        <!-- Panel principal -->
        <div id="cont_panel_principal_fijo">
            <?php include_once __DIR__ . "/../../Template/menuSuperior.php"; ?>
            <!-- Encabezado img -->
            <div class="encbezado_img"></div>
            <!-- Panel central -->
            <div id="panel_central">
                <!-- Panel inferior -->
                <div class="panel_inferior">
                    <!-- PANEL IZQUIERDO 30 -->
                    <div class="panel_central_left_30">
                        <div class="cont_descrip_alta">
                            <?php
                                $userName = $this->userSession->getCurrentUser();
                                $this->user->setUser($userName);
                            ?>
                            <h5 class="tit_matricula">Matrícula: <span class="txt_matricula">IAM0A00<?php echo $this->user->idUser();?></span></h5>
                        </div>
                        <div class="cont_foto_user">
                            <div class="foto_user" style="background-image:url('Public/upload/cover-usuario.jpg');"></div>
                            <!-- <a class="btn_general btn_foto btn_icon m0-auto" href="<?php echo constant('URL') . 'usuario/verFoto/' . $this->user->idUser(); ?>">
                                <img src="<?php //echo constant('URL');?>Public/Assets/images/svg/Icon_camera.svg" alt="">
                            </a> -->
                        </div>
                        <div class="cont_descrip_gen text-center">
                            <h4 class="tit_user"><?php echo $this->user->getTipoUser(); ?></h4>
                            <p class="txt_descripcion"><?php echo $this->user->getNombre() . " " . $this->user->getApellido(); ?></p>
                        </div>
                    </div>
                    <!-- PANEL DERECHO 70 -->
                    <div class="panel_central_right_70">
                        <div class="cont_titulo_cursos">
                            <a class="btn_general btn_regresar btn_icon_reverse" href="<?php echo constant('URL') ?>main">
                                <img src="Public/Assets/images/svg/Icon-arrow-next.svg" alt="">
                            REGRESAR</a>
                            <h3 class="tit_3">INFORMACIÓN</h3>
                            <a class="btn_general btn_editar btn_icon" href="<?php echo constant('URL') . 'usuario/verUser';?>">
                                Editar
                                <img class="img_perfil" src="<?php echo constant('URL'); ?>Public/Assets/images/svg/icono_editar_botones.svg" alt="">
                            </a>
                        </div>
                        <div class="form_general_row">
                            <div class="col_6">
                                <div class="cont_txt_user">
                                    <h4 class="txt_caption"><b>Nombre</b></h4>
                                    <p class="txt_base_raleway"><?php echo $this->user->getNombre(); ?></p>
                                </div>
                                <div class="cont_txt_user">
                                    <h4 class="txt_caption"><b>Apellidos</b></h4>
                                    <p class="txt_base_raleway"><?php echo $this->user->getApellido(); ?></p>
                                </div>
                                <div class="cont_txt_user">
                                    <h4 class="txt_caption"><b>Correo electrónico</b></h4>
                                    <p class="txt_base_raleway"><?php echo $this->user->getUserName(); ?></p>
                                </div>
                                <div class="cont_txt_user">
                                    <h4 class="txt_caption"><b>Teléfono fijo y/o oficina</b></h4>
                                    <p class="txt_base_raleway"><?php echo $this->user->getTelFijo() ? $this->user->getTelFijo() : "-"; ?></p>
                                </div>
                                <div class="cont_txt_user">
                                    <h4 class="txt_caption"><b>Ciudad</b></h4>
                                    <p class="txt_base_raleway"><?php echo $this->user->getCiudad() ? $this->user->getCiudad() : "-"; ?></p>
                                </div>
                                <div class="cont_txt_user">
                                    <h4 class="txt_caption"><b>CURP</b></h4>
                                    <p class="txt_base_raleway"><?php echo $this->user->getCURP() ? $this->user->getCURP() : "-"; ?></p>
                                </div>
                            </div>
                            <div class="col_6">
                                <div class="cont_txt_user">
                                    <h4 class="txt_caption"><b>Celular</b></h4>
                                    <p class="txt_base_raleway"><?php echo $this->user->getTel() ? $this->user->getTel() : "-"; ?></p>
                                </div>
                                <div class="cont_txt_user">
                                    <h4 class="txt_caption"><b>País</b></h4>
                                    <p class="txt_base_raleway"><?php echo $this->user->getPais() ? $this->user->getPais() : "-"; ?></p>
                                </div>
                                <div class="cont_txt_user">
                                    <h4 class="txt_caption"><b>Fecha Nacimiento</b></h4>
                                    <p class="txt_base_raleway"><?php echo $this->user->getFechaNacimiento() ? $this->user->getFechaNacimiento() : "-"; ?></p>
                                </div>
                                <div class="cont_txt_user">
                                    <h4 class="txt_caption"><b>Dirección</b></h4>
                                    <p class="txt_base_raleway"><?php echo $this->user->getDireccion() ? $this->user->getDireccion() : "-"; ?></p>
                                </div>
                                <div class="cont_txt_user">
                                    <h4 class="txt_caption"><b>Codigo Postal</b></h4>
                                    <p class="txt_base_raleway"><?php echo $this->user->getCodigoPostal() ? $this->user->getCodigoPostal() : "-"; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
</body>
</html>