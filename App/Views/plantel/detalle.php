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
                    <h4 class="tit_2">Actualizar : Aula</h4>
                </div>
            </div>

            <!-- Panel inferior -->
            <div class="panel_inferior">

                <!-- FORMULARIO ACTUALIZAR CURSO -->
                <div class="panel_central_left">
                    <div class="cont_descrip_alta">
                        <a class="btn_general btn_regresar btn_icon_reverse" href="<?php echo constant('URL') ?>plantel">
                            <img src="<?php echo constant('URL') ?>Public/Assets/images/svg/Icon-arrow-next.svg" alt="">
                            REGRESAR
                        </a>
                        <p class="txt_descripcion">Ingresa la información necesaria para actualizar el aula</p>
                        <div class="vacio"></div>
                    </div>
                    <div><?php //echo $this->mensaje; ?></div>
                    <!-- FORMULARIO PARA DAR DE ALTA -->
                    <!-- <form id="form_actualizar_curso" class="form_general" action="<?php //echo constant('URL'); ?>consulta/actualizarCurso" method="POST"> -->
                    <form id="form_actualizar_aula" class="form_general" action="" method="POST">
                        <!-- PRIMERA FILA -->
                        <div class="form_general_row">
                            <div class="col_12"> <!-- R1 - COL 1 -->
                                <!-- Grupo: Nombre Curso -->
                                <div class="formulario__grupo" id="grupo__nombreAulaINP">
                                    <label for="nombreAulaINP" class="formulario__label">Nombre del aula</label>
                                    <div class="formulario__grupo-input">
                                        <input type="text" class="formulario__input" name="nombreAulaINP" id="nombreAulaINP" value="<?php echo $this->aula->nomAul; ?>" required>
                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                    </div>
                                    <p class="formulario__input-error">El nombre solo puede contener letras y números.</p>
                                </div>
                            </div>
                        </div>
                        <!-- SEGUNDA FILA -->
                        <div class="form_general_row">
                            <div class="col_6"> <!-- R2 - COL 2 -->
                                <div class="formulario__grupo" id="grupo__maxAulaINP">
                                    <label for="maxAulaINP" class="formulario__label">Costo del curso</label>
                                    <div class="formulario__grupo-input">
                                        <input type="number" class="formulario__input" name="maxAulaINP" id="maxAulaINP" value="<?php echo $this->aula->maxAul; ?>" required>
                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                    </div>
                                    <p class="formulario__input-error">El costo solo puede tener números enteros.</p>
                                </div>
                            </div>
                            <div class="col_6"> <!-- R2 - COL 2 -->
                                <div class="formulario__grupo" id="grupo__duracionCursoINP">
                                    <label for="duracionCursoINP" class="formulario__label">Total de horas del curso</label>
                                    <div class="formulario__grupo-input">
                                        <select name="" id="" disabled="disabled">
                                            <option value="">Toluca</option>
                                        </select>
                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                    </div>
                                    <p class="formulario__input-error">El total de horas del curso sólo pueder números.</p>
                                </div>
                            </div>
                        </div>
                
                        <div class="btn_form btn_form_actualizar">
                            <div class="formulario__mensaje" id="formulario__mensaje">
                                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Todos los campos deben completarse correctamente. </p>
                            </div>
                            <input type="submit" onclick="return confirmActualizar()" name="submit" value="Actualizar Aula">   
                            <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">¡Actualización exitosa!</p>
                        </div>
                    </form>

                </div>
                <!-- INFORMACION DEL CURSO -->
                <div class="panel_central_right">
                    <h4 class="tit_actualizar_curso"><?php echo $this->aula->nomAul; ?></h4>
                    <div class="cont_cover_curso">
                        <img src="<?php echo constant('URL') ?>Public/Assets/images/cover_curso_individual.png" alt="">
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
    <script type="text/javascript" src="<?php echo constant('URL') ?>Public/Assets/js/validar/validarActualizarAula.js?ver=1.0.12"></script>
</body>
</html>