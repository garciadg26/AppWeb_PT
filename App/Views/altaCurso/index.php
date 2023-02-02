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
                        <a class="btn_general btn_regresar btn_icon_left" href="<?php echo constant('URL') ?>consulta"><i class="btn_icon icon_flecha"></i>REGRESAR</a>
                        <p class="txt_descripcion">Ingresa la información necesaria para crear un nuevo curso.</p>
                        <div class="vacio"></div>
                    </div>
                    <div ><?php //MENSAJE DE ERROR 
                        echo $this->mensaje; 
                    ?></div>
                
                    <?php //MENSAJE DE VALIDACIONES
                        echo "<div class='msnErrorLogin'>";
                        for($i = 0; $i < count($this->validarCursos); $i++){
                            echo "<li>".$this->validarCursos[$i]."</li>";
                        }
                        echo "</div>";
                    ?>
            
                    <!-- INICIO - FORMULARIO -->
                    <form id="form_alta_cursos" class="form_general" action="<?php echo constant('URL'); ?>altaCurso/crearCurso" method="POST">
                        <!-- PRIMERA FILA -->
                        <div class="form_general_row">
                            <div class="col_4"> <!-- COL 1 -->
                                <label for="nomCursoINP">Nombre del curso</label><br>
                                <input type="text" name="nomCursoINP" id="" value="<?php echo $this->nomCurso ?>">
                             </div>
                            <div class="col_4"> <!-- COL 2 -->
                                <label for="cosCursoINP">Costo del curso</label><br>
                                <input type="number" name="cosCursoINP" id="" value="<?php echo $this->costoCurso ?>">
                             </div>
                            <div class="col_4"> <!-- COL 3 -->
                                <label for="durCursoINP">Duración del curso</label><br>
                                <input type="number" name="durCursoINP" id="" value="<?php echo $this->durCurso ?>">
                             </div>
                        </div>
                        <!-- SEGUNDA FILA -->
                        <div class="form_general_row">
                            <div class="col_4">
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
                                    <option value="<?php echo $categorias->idCa; ?>" <?php if($this->catCurso == $categorias->idCa) echo "selected" ?>><?php echo $categorias->nombreCa; ?></option>
                                        <?php
                                            }
                                        ?> 
                                </select><br>
                            </div>
                            <div class="col_4">
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
                                    <option value="<?php echo $tipos->idTi; ?>" <?php if($this->tipoCurso == $tipos->idTi) echo "selected" ?>><?php echo $tipos->nombreTi; ?></option>
                                        <?php
                                            }
                                        ?>
                                </select><br>
                            </div>
                            <div class="col_4">
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
                                    <option value="<?php echo $softwares->idSo; ?>" <?php if($this->softCurso == $softwares->idSo) echo "selected" ?>><?php echo $softwares->nombreSo; ?></option>
                                        <?php
                                            }
                                        ?>
                                </select>
                            </div>

                        </div>
                
                        <div class="btn_form btn_form_crear">
                            <input type="submit" name="submit" value="REGISTRAR CURSO">
                        </div>
                    </form>
                    
                </div>
            </div>

        </div>

    </div>
    

    

    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
</body>
</html>