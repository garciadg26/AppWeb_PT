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
                    <h4 class="tit_2">Actualizar : Curso</h4>
                </div>
            </div>

            <!-- Panel inferior -->
            <div class="panel_inferior">

                <!-- FORMULARIO ACTUALIZAR CURSO -->
                <div class="panel_central_left">
                <a class="btn_general btn_regresar btn_icon_left" href="<?php echo constant('URL') ?>consulta"><i class="btn_icon icon_flecha"></i>REGRESAR</a>
                    <div><?php //echo $this->mensaje; ?></div>
                    <!-- FORMULARIO PARA DAR DE ALTA -->
                    <!-- <form id="form_actualizar_curso" class="form_general" action="<?php //echo constant('URL'); ?>consulta/actualizarCurso" method="POST"> -->
                    <form id="form_actualizar_curso" class="form_general" action="" method="POST">
                        <!-- PRIMERA FILA -->
                        <div class="form_general_row">
                            <div class="col_12"> <!-- R1 - COL 1 -->
                                <!-- Grupo: Nombre Curso -->
                                <div class="formulario__grupo" id="grupo__nombreCursoINP">
                                    <label for="nombreCursoINP" class="formulario__label">Nombre del curso</label>
                                    <div class="formulario__grupo-input">
                                        <input type="text" name="nombreCursoINP" id="nombreCursoINP" value="<?php echo $this->curso->nombreC; ?>" required>
                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                    </div>
                                    <p class="formulario__input-error">El nombre solo puede contener letras y números.</p>
                                </div>
                            </div>
                        </div>
                        <!-- SEGUNDA FILA -->
                        <div class="form_general_row">
                            <div class="col_6"> <!-- R2 - COL 2 -->
                                <div class="formulario__grupo" id="grupo__costoCursoINP">
                                    <label for="costoCursoINP" class="formulario__label">Costo del curso</label>
                                    <div class="formulario__grupo-input">
                                        <input type="number" name="costoCursoINP" id="costoCursoINP" value="<?php echo $this->curso->costoC; ?>" required>
                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                    </div>
                                    <p class="formulario__input-error">El costo solo puede tener números enteros.</p>
                                </div>
                            </div>
                            <div class="col_6"> <!-- R2 - COL 2 -->
                                <div class="formulario__grupo" id="grupo__duracionCursoINP">
                                    <label for="duracionCursoINP" class="formulario__label">Total de horas del curso</label>
                                    <div class="formulario__grupo-input">
                                        <input type="text" name="duracionCursoINP" id="duracionCursoINP" value="<?php echo $this->curso->duracionC; ?>" required>
                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                    </div>
                                    <p class="formulario__input-error">El total de horas del curso sólo pueder números.</p>
                                </div>
                            </div>
                        </div>    
                        <!-- TERCERA FILA -->
                        <div class="form_general_row">
                            <div class="col_12"> <!-- R2 - COL 1 -->
                                <!-- SECCION DE CATEGORIAS -->
                                <label for="catCursoINP">Categoría</label><br>
                                <select name="catCursoINP" id="catCursoINP">
                                    <option value="">Seleccionar una categoría</option>
                                        <?php          
                                            foreach($this->categorias as $row)
                                            {
                                                $categorias = new Curso();
                                                $categorias = $row;                 
                                        ?>
                                    <option value="<?php echo $categorias->idCa; ?>" <?php if($this->curso->categoriaC == $categorias->idCa) echo "selected" ?>><?php echo $categorias->nombreCa; ?></option>
                                        <?php
                                            }
                                        ?> 
                                </select><br>
                            </div>
                        </div>
                        <div class="form_general_row">
                            <div class="col_6">
                                <!-- SECCION DE TIPO -->
                                <label for="tipoCursoINP">Tipo de curso</label><br>
                                <select name="tipoCursoINP" id="tipoCursoINP">
                                    <option value="">Seleccionar un tipo</option>
                                        <?php
                                            foreach($this->tipos as $row)
                                            {
                                                $tipos = new Curso();
                                                $tipos = $row;  
                                        ?>
                                    <option value="<?php echo $tipos->idTi; ?>" <?php if($this->curso->tipoC == $tipos->idTi) echo "selected" ?>><?php echo $tipos->nombreTi; ?></option>
                                        <?php
                                            }
                                        ?>
                                </select><br>
                            </div>
                            <div class="col_6">
                                <!-- SECCION DE SOFTWARE -->
                                <label for="softCursoINP">Software</label><br>
                                <select name="softCursoINP" id="softCursoINP">
                                    <option value="">Seleccionar un software</option>
                                        <?php
                                            foreach($this->softwares as $row)
                                            {
                                                $softwares = new Curso();
                                                $softwares = $row;  
                                        ?>
                                    <option value="<?php echo $softwares->idSo; ?>" <?php if($this->curso->softwareC == $softwares->idSo) echo "selected" ?>><?php echo $softwares->nombreSo; ?></option>
                                        <?php
                                            }
                                        ?>
                                </select>
                            </div>
                        </div>
                
                        <div class="btn_form btn_form_actualizar">
                            <div class="formulario__mensaje" id="formulario__mensaje">
                                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Todos los campos deben completarse correctamente. </p>
                            </div>
                            <input type="submit" onclick="return confirmActualizar()" name="submit" value="Actualizar curso">   
                            <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">¡Actualización exitosa!</p>
                        </div>
                    </form>

                </div>
                <!-- INFORMACION DEL CURSO -->
                <div class="panel_central_right">
                    <h4 class="tit_actualizar_curso"><?php echo $this->curso->nombreC; ?></h4>
                    <div class="cont_cover_curso">
                        <img src="<?php echo constant('URL') ?>Public/Assets/images/cover_curso_individual.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
    <script type="text/javascript" src="<?php echo constant('URL') ?>Public/Assets/js/validarActualizarCurso.js?ver=1.0.21"></script>
</body>
</html>