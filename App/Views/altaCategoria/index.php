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
                    <h4 class="tit_2">Registrar : Nueva categoría</h4>
                </div>
                <!-- Panel central único -->
                <div class="panel_central_unico">
                    <div class="cont_descrip_alta">
                        <div class="cont_descrip_alta">
                            <a class="btn_general btn_regresar btn_icon_reverse" href="<?php echo constant('URL') ?>categoria">
                                <img src="<?php echo constant('URL') ?>Public/Assets/images/svg/Icon-arrow-next.svg" alt="">
                                REGRESAR
                            </a>
                        </div>
                        <p class="txt_descripcion">Ingresa la información necesaria para crear un nuevo curso.</p>
                        <div class="vacio"></div>
                    </div>
                    <div ><?php //MENSAJE DE ERROR 
                        echo $this->mensaje; 
                    ?></div>
                
                    <?php //MENSAJE DE VALIDACIONES
                        //echo "<div class='msnErrorLogin'>";
                        //for($i = 0; $i < count($this->validarCursos); $i++){
                        //    echo "<li>".$this->validarCursos[$i]."</li>";
                        //}
                        //echo "</div>";
                    ?>
            
                    <!-- INICIO - FORMULARIO -->
                    <!-- <form id="form_alta_cursos" class="form_general" action="<?php //echo constant('URL'); ?>altaCurso/crearCurso" method="POST"> -->
                    <form id="form_alta_cursos" class="form_general" action="" method="POST">
                        <!-- PRIMERA FILA -->
                        <div class="form_general_row">
                            <div class="col_8"> <!-- COL 1 -->
                                <!-- Grupo: Nombre Curso -->
                                <div class="formulario__grupo" id="grupo__nomCategoriaINP">
                                    <label for="nomCategoriaINP" class="formulario__label">Nombre de la categoría</label>
                                    <div class="formulario__grupo-input">
                                        <input type="text" class="formulario__input" name="nomCategoriaINP" id="nomCategoriaINP" placeholder="Nombre completo de la categoría"  value="<?php echo $this->nomCurso ?>">
                                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                    </div>
                                    <p class="formulario__input-error">El nombre de la categoría solo puede contener letras y números.</p>
                                </div>
                             </div>
                        </div>
                        <div class="btn_form btn_form_crear">
                            <div class="formulario__mensaje" id="formulario__mensaje">
                                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Todos los campos deben completarse correctamente. </p>
                            </div>
                            <input type="submit" name="submit" value="REGISTRAR CATEGORÍA">
                            <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
    </div>
    

    

    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
    <script type="text/javascript" src="<?php echo constant('URL') ?>Public/Assets/js/validarAltaCategoria.js?ver=1.0.10"></script>
</body>
</html>