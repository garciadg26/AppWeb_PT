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
                    <h4 class="tit_2">Registrar : Nueva aula</h4>
                </div>
                <!-- Panel central único -->
                <div class="panel_central_unico">
                    <div class="cont_descrip_alta">
                        <a class="btn_general btn_regresar btn_icon_reverse" href="<?php echo constant('URL') ?>plantel">
                            <img src="Public/Assets/images/svg/Icon-arrow-next.svg" alt="">
                        REGRESAR</a>
                        <p class="txt_descripcion">Ingresa la información necesaria para crear una <b>nueva aula.</b></p>
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
                    <form id="form_alta_aulas" class="form_general" action="" method="POST">
                        <!-- PRIMERA FILA -->
                        <div class="form_general_row">
                            <div class="col_8"> <!-- COL 1 -->
                                <!-- Grupo: Nombre Curso -->
                                <div class="formulario__grupo" id="grupo__nomAulaINP">
                                    <label for="nomAulaINP" class="formulario__label">Nombre del aula</label>
                                    <div class="formulario__grupo-input">
                                        <input type="text" class="formulario__input" name="nomAulaINP" id="nomAulaINP" placeholder="Nombre completo del aula"  value="<?php echo $this->nomAula ?>">
                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                    </div>
                                    <p class="formulario__input-error">El nombre solo puede contener letras y números.</p>
                                </div>
                             </div>
                            <div class="col_2"> <!-- COL 2 -->
                                <!-- Grupo: Costo Curso -->
                                <div class="formulario__grupo" id="grupo__maxAulaINP">
                                    <label for="maxAulaINP" class="formulario__label">Capacidad máxima</label>
                                    <div class="formulario__grupo-input">
                                        <input type="number" class="formulario__input" name="maxAulaINP" id="maxAulaINP" placeholder="0"  value="<?php echo $this->maxAula ?>">
                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                    </div>
                                    <p class="formulario__input-error">Solo puede tener números enteros.</p>
                                </div>
                             </div>
                            <div class="col_2"> <!-- COL 3 -->
                                <!-- Grupo: Duración Curso -->
                                <div class="formulario__grupo" id="grupo__durCursoINP">
                                    <label for="durCursoINP" class="formulario__label">Plantel</label>
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
                        <div class="btn_form btn_form_crear">
                            <div class="formulario__mensaje" id="formulario__mensaje">
                                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Todos los campos deben completarse correctamente. </p>
                            </div>
                            <input type="submit" name="submit" value="REGISTRAR AULA">
                            <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">¡Aula creada exitosamente!</p>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
    </div>
    

    

    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
    <script type="text/javascript" src="<?php echo constant('URL') ?>Public/Assets/js/validar/validarAltaAula.js?ver=1.1.10"></script>
</body>
</html>