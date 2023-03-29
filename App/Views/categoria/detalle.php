<?php include_once __DIR__ . "/../../Includes/headHome.php"; ?>
    
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
                    <h4 class="tit_2">Actualizar : Categoría</h4>
                </div>
            </div>

            <!-- Panel inferior -->
            <div class="panel_inferior">

                <!-- FORMULARIO ACTUALIZAR CURSO -->
                <div class="panel_central_left">
                    <div class="cont_descrip_alta">
                        <a class="btn_general btn_regresar btn_icon_reverse" href="<?php echo constant('URL') ?>categoria">
                            <img src="<?php echo constant('URL') ?>Public/Assets/images/svg/Icon-arrow-next.svg" alt="">
                            REGRESAR
                        </a>
                        <p class="txt_descripcion">Ingresa la información necesaria para actualizar la categoría</p>
                        <div class="vacio"></div>
                    </div>
                    <div><?php //echo $this->mensaje; ?></div>
                    <!-- FORMULARIO PARA DAR DE ALTA -->
                    <!-- <form id="form_actualizar_curso" class="form_general" action="<?php //echo constant('URL'); ?>consulta/actualizarCurso" method="POST"> -->
                    <form id="form_actualizar_categoria" class="form_general" action="" method="POST">
                        <!-- PRIMERA FILA -->
                        <div class="form_general_row">
                            <div class="col_12"> <!-- R1 - COL 1 -->
                                <!-- Grupo: Nombre Curso -->
                                <div class="formulario__grupo" id="grupo__nomCategoriaINP">
                                    <label for="nomCategoriaINP" class="formulario__label">Nombre de la categoría</label>
                                    <div class="formulario__grupo-input">
                                        <input type="text" name="nomCategoriaINP" id="nomCategoriaINP" value="<?php echo $this->categoria->nombreCa; ?>" required>
                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                    </div>
                                    <p class="formulario__input-error">El nombre de la categoría solo puede contener letras y números.</p>
                                </div>
                            </div>
                        </div>   
                        <div class="btn_form btn_form_actualizar">
                            <div class="formulario__mensaje" id="formulario__mensaje">
                                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Todos los campos deben completarse correctamente. </p>
                            </div>
                            <input type="submit" onclick="return confirmActualizar()" name="submit" value="Actualizar categoría">   
                            <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                        </div>
                    </form>

                </div>
                <!-- INFORMACION DEL CURSO -->
                <div class="panel_central_right">
                    <h4 class="tit_actualizar_curso"><?php echo $this->categoria->nombreCa; ?></h4>
                    <div class="cont_cover_curso">
                        <img src="<?php echo constant('URL') ?>Public/Assets/images/cover_curso_individual.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
    <script type="text/javascript" src="<?php echo constant('URL') ?>Public/Assets/js/validarActualizarCategoria.js?ver=1.0.11"></script>
</body>
</html>