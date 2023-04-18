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
                    <h4 class="tit_2">Actualizar : Equipo de cómputo</h4>
                </div>
            </div>

            <!-- Panel inferior -->
            <div class="panel_inferior">

                <!-- FORMULARIO ACTUALIZAR CURSO -->
                <div class="panel_central_left">
                    <div class="cont_descrip_alta">
                        <a class="btn_general btn_regresar btn_icon_reverse" href="<?php echo constant('URL') ?>computo">
                            <img src="<?php echo constant('URL') ?>Public/Assets/images/svg/Icon-arrow-next.svg" alt="">
                            REGRESAR
                        </a>
                        <p class="txt_descripcion">Ingresa la información necesaria para actualizar el aula</p>
                        <div class="vacio"></div>
                    </div>
                    <div><?php //echo $this->mensaje; ?></div>
                    <!-- FORMULARIO PARA DAR DE ALTA -->
                    <!-- <form id="form_actualizar_curso" class="form_general" action="<?php //echo constant('URL'); ?>consulta/actualizarCurso" method="POST"> -->
                    <form id="form_actualizar_equipo" class="form_general" action="" method="POST">
                        <!-- PRIMERA FILA -->
                        <div class="form_general_row">
                            <div class="col_12"> <!-- R1 - COL 1 -->
                                <!-- Grupo: Nombre Curso -->
                                <div class="formulario__grupo" id="grupo__nombreEquINP">
                                    <label for="nombreEquINP" class="formulario__label">Nombre del equipo</label>
                                    <div class="formulario__grupo-input">
                                        <input type="text" class="formulario__input" name="nombreEquINP" id="nombreEquINP" value="<?php echo $this->equipo->nomEqu; ?>" required>
                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                    </div>
                                    <p class="formulario__input-error">El nombre solo puede contener letras y números.</p>
                                </div>
                            </div>
                        </div>
                        <!-- SEGUNDA FILA -->
                        <div class="form_general_row">
                            <div class="col_6"> <!-- R2 - COL 2 -->
                                <div class="formulario__grupo" id="grupo__numSerieEquINP">
                                    <label for="numSerieEquINP" class="formulario__label">Número de serie</label>
                                    <div class="formulario__grupo-input">
                                        <input type="text" class="formulario__input" name="numSerieEquINP" id="numSerieEquINP" value="<?php echo $this->equipo->numSerieEqu; ?>" required>
                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                    </div>
                                    <p class="formulario__input-error">Solo puede tener números enteros.</p>
                                </div>
                            </div>
                            <div class="col_6"> <!-- R2 - COL 2 -->
                                <div class="formulario__grupo" id="grupo__estatusEquINP">
                                    <label for="estatusEquINP" class="formulario__label">Disponible</label>
                                    <div class="formulario__grupo-input">
                                        <select name="estatusEquINP" id="estatusEquINP">
                                            <?php if($this->equipo->estatusEqu == 'NO'){ 
                                            ?>
                                                <option value="<?php echo $this->equipo->estatusEqu; ?>"><?php echo $this->equipo->estatusEqu; ?></option>
                                                <option value="SI">SI</option>
                                            <?php
                                            } else{
                                            ?>
                                                <option value="<?php echo $this->equipo->estatusEqu; ?>"><?php echo $this->equipo->estatusEqu; ?></option>
                                                <option value="NO">NO</option>
                                            <?php } ?>
                                        </select>
                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                    </div>
                                    <p class="formulario__input-error">Solo se permite un valor.</p>
                                </div>
                            </div>
                        </div>
                
                        <div class="btn_form btn_form_actualizar">
                            <div class="formulario__mensaje" id="formulario__mensaje">
                                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Todos los campos deben completarse correctamente. </p>
                            </div>
                            <input type="submit" onclick="return confirmActualizar()" name="submit" value="Actualizar Equipo">   
                            <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">¡Actualización exitosa!</p>
                        </div>
                    </form>

                </div>
                <!-- INFORMACION DEL CURSO -->
                <div class="panel_central_right">
                    <h4 class="tit_actualizar_curso"><?php echo $this->equipo->nomEqu; ?></h4>
                    <div class="cont_cover_curso">
                        <img src="<?php echo constant('URL') ?>Public/Assets/images/cover_curso_individual.png" alt="">
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
    <script type="text/javascript" src="<?php echo constant('URL') ?>Public/Assets/js/validar/validarActualizarEquipo.js?ver=1.0.13"></script>
</body>
</html>