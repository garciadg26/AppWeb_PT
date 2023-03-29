<?php include_once __DIR__ . "/../../Includes/head.php"; ?>
<?php include_once 'App/Models/curso.php'; ?>
    
    
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
            <div id="panel_central">
                <div class="titulo_panel">
                    <h4 class="tit_2">Registrar : Nuevo curso</h4>
                </div>
                <!-- Panel central único -->
                <div class="panel_central_unico">
                    <div class="cont_descrip_alta">
                        <a class="btn_general btn_regresar btn_icon_reverse" href="<?php echo constant('URL') ?>consulta">
                            <img src="Public/Assets/images/svg/Icon-arrow-next.svg" alt="">
                        REGRESAR</a>
                        <p class="txt_descripcion">Ingresa la información necesaria para crear un nuevo curso.</p>
                        <div class="vacio"></div>
                    </div>
                    <div ><?php //MENSAJE DE ERROR 
                        echo $this->mensaje; 
                    ?></div>
                                
                
                    <?php //MENSAJE DE VALIDACIONES
                        // echo "<div class='msnErrorLogin'>";
                        // for($i = 0; $i < count($this->validarCursos); $i++){
                        //    echo "<li>".$this->validarCursos[$i]."</li>";
                        // }
                        // echo "</div>";
                    ?>
            
                    <!-- INICIO - FORMULARIO -->
                    <!-- <form id="form_alta_cursos" class="form_general" action="<?php //echo constant('URL'); ?>altaCurso/crearCurso" method="POST"> -->
                    <form id="form_alta_cursos" class="form_general" action="" method="POST">
                        <!-- PRIMERA FILA -->
                        <div class="form_general_row">
                            <div class="col_8"> <!-- COL 1 -->
                                <!-- Grupo: Nombre Curso -->
                                <div class="formulario__grupo" id="grupo__nomCursoINP">
                                    <label for="nomCursoINP" class="formulario__label">Nombre del curso</label>
                                    <div class="formulario__grupo-input">
                                        <input type="text" class="formulario__input" name="nomCursoINP" id="nomCursoINP" placeholder="Nombre completo del curso"  value="<?php echo $this->nomCurso ?>">
                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                    </div>
                                    <p class="formulario__input-error">El nombre solo puede contener letras y números.</p>
                                </div>
                             </div>
                            <div class="col_2"> <!-- COL 2 -->
                                <!-- Grupo: Costo Curso -->
                                <div class="formulario__grupo" id="grupo__cosCursoINP">
                                    <label for="cosCursoINP" class="formulario__label">Costo del curso</label>
                                    <div class="formulario__grupo-input">
                                        <input type="number" class="formulario__input" name="cosCursoINP" id="cosCursoINP" placeholder="0"  value="<?php echo $this->costoCurso ?>">
                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                    </div>
                                    <p class="formulario__input-error">El costo solo puede tener números enteros.</p>
                                </div>
                             </div>
                            <div class="col_2"> <!-- COL 3 -->
                                <!-- Grupo: Duración Curso -->
                                <div class="formulario__grupo" id="grupo__durCursoINP">
                                    <label for="durCursoINP" class="formulario__label">Total de horas del curso</label>
                                    <div class="formulario__grupo-input">
                                        <input class="formulario__input" type="number" min="00:00" max="72:00" name="durCursoINP" id="durCursoINP" placeholder="00" value="<?php echo $this->durCurso ?>">
                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                    </div>
                                    <p class="formulario__input-error">El total de horas del curso sólo pueder números.</p>
                                </div>
                             </div>
                        </div>
                        <!-- SEGUNDA FILA -->
                        <div class="form_general_row">
                            <div class="col_4">
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
                                    <option value="<?php echo $categorias->idCa; ?>" <?php if($this->catCurso == $categorias->idCa) echo "selected" ?>><?php echo $categorias->nombreCa; ?></option>
                                        <?php
                                            }
                                        ?> 
                                </select><br>
                            </div>
                            <div class="col_4">
                                <!-- SECCION DE TIPO -->
                                <label for="tipoCursoINP">Tipo de curso</label><br>
                                <select name="tipoCursoINP" id="tipoCurso">
                                    <option value="">Seleccionar un tipo</option>
                                        <?php
                                            foreach($this->tipos as $row)
                                            {
                                                $tipos = new Curso();
                                                $tipos = $row;  
                                        ?>
                                    <option value="<?php echo $tipos->idTi; ?>" <?php if($this->tipoCurso == $tipos->idTi) echo "selected" ?>><?php echo $tipos->nombreTi; ?></option>
                                        <?php
                                            }
                                        ?>
                                </select><br>
                            </div>
                            <div class="col_4">
                                <!-- SECCION DE SOFTWARE -->
                                <label for="softCursoINP">Software</label><br>
                                <select name="softCursoINP" id="softwareCurso">
                                    <option value="">Seleccionar un software</option>
                                        <?php
                                            foreach($this->softwares as $row)
                                            {
                                                $softwares = new Curso();
                                                $softwares = $row;  
                                        ?>
                                    <option value="<?php echo $softwares->idSo; ?>" <?php if($this->softCurso == $softwares->idSo) echo "selected" ?>><?php echo $softwares->nombreSo; ?></option>
                                        <?php
                                            }
                                        ?>
                                </select>
                            </div>
                        </div>
                
                        <div class="btn_form btn_form_crear">
                            <div class="formulario__mensaje" id="formulario__mensaje">
                                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Todos los campos deben completarse correctamente. </p>
                            </div>
                            <input type="submit" name="submit" value="REGISTRAR CURSO">
                            <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">¡Curso creado exitosamente!</p>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
    </div>
    

    

    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
    <script type="text/javascript" src="<?php echo constant('URL') ?>Public/Assets/js/validarAltaCurso.js?ver=1.1.28"></script>
</body>
</html>