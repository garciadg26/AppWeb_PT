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
                    <div><?php echo $this->mensaje; ?></div>
                    <!-- FORMULARIO PARA DAR DE ALTA -->
                    <form id="form_actualizar_curso" class="form_general" action="<?php echo constant('URL'); ?>consulta/actualizarCurso" method="POST">
                        <!-- PRIMERA FILA -->
                        <div class="form_general_row1">
                            <div class="row1_col1"> <!-- R1 - COL 1 -->
                                <label for="nombreCursoINP">Nombre del curso</label><br>
                                <input type="text" name="nombreCursoINP" value="<?php echo $this->curso->nombreC; ?>" required>
                            </div>
                        </div>
                        <!-- SEGUNDA FILA -->
                        <div class="form_general_row2">
                            <div class="row2_col1"> <!-- R2 - COL 2 -->
                                <label for="costoCursoINP">Precio del curso</label><br>
                                <input type="number" name="costoCursoINP" value="<?php echo $this->curso->costoC; ?>" required>
                            </div>
                            <div class="row2_col2"> <!-- R2 - COL 2 -->
                                <label for="duracionCursoINP">Duración del curso (hrs)</label><br>
                                <input type="text" name="duracionCursoINP" value="<?php echo $this->curso->duracionC; ?>" required>
                            </div>
                        </div>    
                        <!-- TERCERA FILA -->
                        <div class="form_general_row3">
                            <div class="row3_col1"> <!-- R2 - COL 1 -->
                                <!-- SECCION DE CATEGORIAS -->
                                <label for="catCursoINP">Categoría</label><br>
                                <select name="catCursoINP" id="">
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
                        <div class="form_general_row4">
                            <div class="row4_col1">
                                <!-- SECCION DE TIPO -->
                                <label for="tipoCursoINP">Tipo de curso</label><br>
                                <select name="tipoCursoINP" id="">
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
                            <div class="row4_col2">
                                <!-- SECCION DE SOFTWARE -->
                                <label for="softCursoINP">Software</label><br>
                                <select name="softCursoINP" id="">
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
                            <input type="submit" onclick="return confirmActualizar()" name="submit" value="Actualizar curso">   
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
</body>
</html>