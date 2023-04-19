<?php 
    include_once __DIR__ . "/../../Includes/head.php";
?>
    <!-- Contenedor -->
    <div class="cont_flex">
        <!-- Aside -->
        <aside id="cont_aside">
            <?php
                include_once __DIR__ . "/../../Template/asideMenu.php";
                include_once __DIR__ . "/../../Template/asideFooter.php";
            ?>
        </aside>
        <!-- Panel principal -->
        <div id="cont_panel_principal_fijo">
            <?php include_once __DIR__ . "/../../Template/menuSuperior.php"; ?>
            <!-- Panel central -->
            <div id="panel_central">
                <div class="titulo_panel">
                    <h4 class="tit_2">CONSULTAR : ALUMNOS</h4>
                </div>
                <div class="form_general_row">
                    <!-- TABLA DE DATOS -->
                    <div class="col_9">
                        <!-- Panel central único -->
                        <div class="panel_central_unico">
                            <div class="cont_titulo_cursos">
                                <a class="btn_general btn_regresar btn_icon_reverse" href="<?php echo constant('URL') ?>main">
                                    <img src="Public/Assets/images/svg/Icon-arrow-next.svg" alt="">
                                REGRESAR</a>
                                <h3 class="tit_3">ALUMNOS</h3>
                                <div class="vacio"></div>
                            </div>
                            <!-- Buscador -->
                            <div class="cont_sortable">
                                <input type="text" class="form-control" id="buscadorINP" onkeyup="buscarAlumno()" placeholder="Buscar alumno...">
                            </div>
                            <!-- TABLA ALUMNOS -->
                            <table id="tabla_panel_alumnos" class="tabla_panel">
                                <thead class="titulo_tabla_panel">
                                    <tr id="tit_tabla_alumnos">
                                        <th>Matrícula</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Teléfono</th>        
                                        <th>Edad</th>
                                        <th>Fecha inicio</th>
                                    </tr>
                                </thead>
                                <tbody class="cuerpo_tabla_panel">
                                    <?php
                                        $fechaNacimiento = "";
                                        $Alu = new Alumnos();
                                        foreach($this->alumnos as $row){
                                            $alumno = new Alumno();
                                            $alumno = $row;                                            
                                            $fechaNacimiento = $alumno->FechaNacAlu;
                                            $edad = $Alu->getEdad($fechaNacimiento);
                                            ?>
                                        <tr>
                                            <td>A00<?php echo $alumno->idAlu; ?></td>
                                            <td><?php echo $alumno->NombreAlu . " " . $alumno->ApellidosAlu; ?></td>
                                            <td><?php echo $alumno->EmailAlu; ?></td>
                                            <td><?php echo $alumno->TelAlu; ?></td>
                                            <td><?php echo $edad;?></td>
                                            <td><?php echo $alumno->FechaCreadoAlu; ?></td>
                                        </tr>
                                            <?php } //TERMINA EL CICLO ?>
                                </tbody>
                            </table>
                            <p id="Error_filtro_vacio">Contenido vacio</p>
                            <div class="cont_paginacion">
                                <a href="javascript:prevPage()" id="btn_prev">Atras</a>
                                <a href="javascript:nextPage()" id="btn_next">Siguiente</a>
                                <p class="txt_caption">páginas:</p>    
                                <span id="page"></span>
                            </div>
                        </div>
                    </div>
                    <!-- DESCARGAR EXCEL -->
                    <div class="col_3">
                        <div class="panel_central_unico">
                            <div class="cont_titulo_cursos">
                                <div class="vacio"></div>
                                <h3 class="tit_3">REPORTE</h3>
                                <div class="vacio"></div>
                            </div>
                            <div class="text-center">
                                <img class="icon_exel" src="<?php echo constant('URL') ?>Public/Assets/images/svg/microsoft-excel-icon.svg" alt="">
                            </div>
                            <a class="btn_general btn_download btn_icon m0-auto" href="<?php echo constant('URL') ?>alumnos/descargar">
                                DESCARGAR
                                <img src=" <?php echo constant('URL') ?>Public/Assets/images/svg/icon-download.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
    <script type="text/javascript" src="<?php echo constant('URL') ?>Public/Assets/js/buscadorT.js?ver=1.1.12"></script>
    <script type="text/javascript" src="<?php echo constant('URL') ?>Public/Assets/js/paginacionAlu.js?ver=1.1.10"></script>