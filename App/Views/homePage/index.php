<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> -->
    
    <?php include_once __DIR__ . "/../../Includes/headHome.php"; ?>
    <?php include_once 'App/Models/curso.php'; ?>

    <!-- Contenedor -->
    <div id="homePage" class="cont_flex">
        <aside id="cont_aside">
            <?php include_once __DIR__ . "/../../Template/asideMenu.php"; ?>
            <?php include_once __DIR__ . "/../../Template/asideFooter.php"; ?>
        </aside>
        <!-- Panel principal -->
        <div id="cont_panel_principal">
            <?php include_once __DIR__ . "/../../Template/menuSuperior.php"; ?>
            <!-- Panel superior -->
            <div id="panel_superior">
                <img src="<?php echo constant('URL'); ?>Public/Assets/images/cover_portada_alumno_homePage.jpg" alt="">
            </div>
            <!-- Panel central -->
            <div id="panel_superior2">
                <section class="cont_central_encabezado">
                    <!-- TEXTO ENCABEZADO -->
                    <div class="cont_encabezado_tit">
                        <h4 class="tit_2 "><span class="col_destacado"><?php echo $user->getNombre(); ?>:</span> CONTINUA DONDE TE QUEDASTE</h4>
                        <p class="txt_base_raleway">Seguir aprendiendo y mejorando te abre un mundo de nuevas posibilidades.</p>
                    </div> 
                    <!-- TARJETA ENCABEZADO -->
                    <div class="cont_encabezado_grupo">
                        <div class="tarjeta_encabezado">
                            <div class="cont_img_tarjeta">
                                <img src="<?php echo constant('URL') ?>Public/Assets/images/cover_tarjeta_grupo_pytho_alumno.jpg" alt="">
                            </div>
                            <div class="cont_txt_tarjeta">
                                <div class="cont_fecha_hora_tarjeta">
                                    <p><i class="icon_g_tarjeta icon_g1"></i>Martes y jueves</p>
                                    <p><i class="icon_g_tarjeta icon_g2"></i>10:00 am</p>
                                </div>
                                <h4 class="tit_5">PROGRAMACIÓN CON PYTON</h4>
                                <a class="btn_general btn_inhabil btn_icon_right" href="#">CONTINUAR<i class="btn_icon icon_flecha"></i></a>
                            </div>
                        </div>
                    </div>                   
                </section>
            </div>
            <!-- Panel inferior -->
            <div class="panel_inferior">
                <div class="cont_cursos_card">
                    <h4 class="tit_3">CURSOS</h4>
                    <!-- Buscar cursos -->
                    <div class="cont_sortable">
                        <input type="text" class="form-control" id="buscadorINP" onkeyup="searchFilter()" placeholder="Buscar curso...">
                        <div class="cont_sortable_select">
                            <select class="form-select select_filter" id="filterByCurso" onchange="searchFilter()">
                                <option value="" selected>Todas las categoría</option>
                                <?php 
                                    $categorias = [];
                                    $categorias = $user->getCategorias();
                                    foreach($categorias as $row)
                                    {
                                        $categorias = new Curso();
                                        $categorias = $row;
                                        //Obtener última palabra
                                        $ruta = $categorias->nombreCa;
    
                                        $array_palabras = explode(' ', $ruta);
                                        $longitud_array = count($array_palabras);
                                        if($longitud_array > 1){
                                            $cadena = substr(strrchr($ruta, " "), 1);
                                        } else{
                                            $cadena = $categorias->nombreCa;
                                        }
                                ?>
                                <option value="<?php echo $cadena; ?>"><?php echo $categorias->nombreCa; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <select class="form-select select_filter" id="filterByTipo" onchange="searchFilter()">
                                <option value="" selected>Todos los tipos</option>
                                <?php 
                                    $tipo = [];
                                    $tipo = $user->getTipo();
                                    foreach($tipo as $row)
                                    {
                                        $tipo = new Curso();
                                        $tipo = $row;
                                        //Obtener última palabra
                                        $ruta = $tipo->nombreTi;
    
                                        $array_palabras = explode(' ', $ruta);
                                        $longitud_array = count($array_palabras);
                                        if($longitud_array > 1){
                                            $cadena = substr(strrchr($ruta, " "), 1);
                                        } else{
                                            $cadena = $tipo->nombreTi;
                                        }
                                ?>
                                <option value="<?php echo $cadena; ?>"><?php echo $tipo->nombreTi; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <select class="form-select select_filter" id="filterBySoftware" onchange="searchFilter()">
                                <option value="" selected>Todos los Software</option>
                                <?php 
                                    $software = [];
                                    $software = $user->getSoftware();
                                    foreach($software as $row)
                                    {
                                        $software = new Curso();
                                        $software = $row;
                                        //Obtener última palabra
                                        $ruta = $software->nombreSo;
    
                                        $array_palabras = explode(' ', $ruta);
                                        $longitud_array = count($array_palabras);
                                        if($longitud_array > 1){
                                            $cadena = substr(strrchr($ruta, " "), 1);
                                        } else{
                                            $cadena = $software->nombreSo;
                                        }
                                ?>
                                <option value="<?php echo $cadena; ?>"><?php echo $software->nombreSo; ?></option>
                                <?php
                                }
                                ?>
                            </select>

                        </div>
                    </div>
                    <p class="txt_base_raleway">Mejora cualquier habilidad </p>
                    <!-- LISTADO DE CURSOS -->
                    <div id="card_cursos" class="cont_grup_card_cursos">

                        <?php

                            $cursos = [];
                            $cursos = $user->getCurso();
                            foreach($cursos as $row){
                                $cursos = new Curso();
                                $cursos = $row;  
                        ?>
                        <article class="card_curso <?php echo $cursos->categoriaC . " " . $cursos->tipoC . " " . $cursos->softwareC;?>">
                            <img src="<?php echo constant('URL') . $cursos->fotoURLC; ?>" alt="">
                            <div class="card_body">
                                <span class="tag_curso tag_categoria"><?php echo $cursos->categoriaC; ?></span>
                                <span class="tag_curso tag_tipo"><?php echo $cursos->tipoC; ?></span>
                                <span class="tag_curso tag_software"><?php echo $cursos->softwareC; ?></span>
                                <h4 class="tit_5"><?php echo $cursos->nombreC; ?></h4>
                                <p class="txt_caption">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                                <div class="cont_datos_card">
                                    <p class="card_curso_precio">$<?php echo $cursos->costoC; ?></p>
                                    <p class="card_curso_duracion"><?php echo $cursos->duracionC; ?>hrs</p>
                                </div>
                            </div>
                        </article>
                        <?php
                            }//Termina el ciclo Foreach  
                        ?>

                        <p id="Error_filtro_vacio">Contenido vacio</p>
                    </div>
                </div>
            </div>

        </div>

    </div>


        <?php //include_once __DIR__ . "/../../Includes/footer.php"; ?>
        <script type="text/javascript" src="<?php echo constant('URL') . "Public/Assets/js/buscadorT.js?ver=1.1.20"; ?>"></script>

</body>
</html>