

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
    
    <!-- Contenedor -->
    <div class="cont_flex">
        <!-- Aside -->
        <aside id="cont_aside">
            <?php include_once __DIR__ . "/../../Template/asideMenu.php"; ?>
            <?php include_once __DIR__ . "/../../Template/asideFooter.php"; ?>
        </aside>
        <!-- Panel principal fijo -->
        <div id="cont_panel_principal_fijo">
            <?php include_once __DIR__ . "/../../Template/menuSuperior.php"; ?>
            <!-- Panel central -->
            <div id="panel_central">

                <div class="titulo_panel">
                    <h4 class="tit_2">Bienvenido : <?php echo $user->getNombre(); ?></h4>
                </div>

                <div class="cont_contadores_panel">
                    <div class="tarjeta_cont tarjeta_p_admin1">
                        <span class="cont_numero_ps"><?php
                        $alumnos = [];
                        $alumnos = $user->getNumAlumnos();
                        echo $alumnos->totalAlu;
                        ?></span>
                        <p class="cont_descriptivo_ps">Alumnos</p>
                    </div>
                    <div class="tarjeta_cont tarjeta_p_admin2">
                        <span class="cont_numero_ps"><?php 
                        $categorias = [];
                        $categorias = $user->getNumCategorias();
                        echo $categorias->totalCat;
                        ?></span>
                        <p class="cont_descriptivo_ps">Categorías</p>
                    </div>
                    <div class="tarjeta_cont tarjeta_p_admin3">
                        <span class="cont_numero_ps"><?php
                        $equipos = [];
                        $equipos = $user->getNumEquipos();
                        echo $equipos->totalEqu;
                        ?></span>
                        <p class="cont_descriptivo_ps">Equipos de cómputo</p>
                    </div>
                    <div class="tarjeta_cont tarjeta_p_admin4">
                        <span class="cont_numero_ps"><?php 
                        $cursos = [];
                        $cursos = $user->getNumCurso(); 
                        echo $cursos->totalC;
                        ?></span>
                        <p class="cont_descriptivo_ps">Cursos</p>
                    </div>
                </div>
            </div>
            <!-- Panel inferior -->
            <div class="panel_inferior">
                <!-- GRUPOS -->
                <div class="panel_central_left">
                    <h3 class="tit_3">Grupos</h3>
                    <div class="cont_grupos_panel">
                        <div class="cont_tarjeta_grupo_panel">
                            <span class="txt_caption">Grupo : 4</span>
                            <img src="<?php echo constant('URL') ?>Public/assets/images/icon_grupo_tarjeta_panel_admin.png" alt="">
                            <p class="txt_tarjeta">Ilustración Digital con Ipad Procreate</p>
                        </div>
                        <div class="cont_tarjeta_grupo_panel">
                            <span class="txt_caption">Grupo : 8</span>
                            <img src="<?php echo constant('URL') ?>Public/assets/images/icon_grupo_tarjeta_panel_admin.png" alt="">
                            <p class="txt_tarjeta">Desarrollo de Personajes con Blender</p>
                        </div>
                    </div>
                </div>
                <!-- CURSOS -->
                <div class="panel_central_right">
                    <div class="cont_titulo_cursos">
                        <h3 class="tit_3">CURSOS</h3>
                        <a class="btn_general btn_principal btn_icon_right" href="consulta">VER CURSO<i class="btn_icon icon_flecha"></i></a>
                    </div>
                    <table id="tabla_panel_admin" class="tabla_panel">
                        <thead class="titulo_tabla_panel">
                            <tr id="tit_tabla">
                                <th>Nombre</th>
                                <th>Costo</th>
                            </tr>
                        </thead>
                        <tbody class="cuerpo_tabla_panel">
                            <?php
                                //Importamos libreria de la clase curso  
                                
                                include_once 'App/Models/curso.php';
                                $cursos = [];
                                $contador = 5;
                                $cursos = $user->getCurso();
                                foreach($cursos as $row){
                                    // for($i = 0; $i <= $contador; $i ++){
                                        
                                    $cursos = new Curso();
                                    $cursos = $row; 
                                
                            ?>
                            <tr>
                                <td><?php echo $cursos->nombreC; ?></td>
                                <td><?php echo "$" . number_format($cursos->costoC,0) . " <span class='txt_pesos'>MXN</span>" ; ?></td>
                            </tr>
                            <?php
                                }//Termina el ciclo Foreach  
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
                
        </div><!-- Fin Panel principal -->
    </div><!-- Fin Contenedor -->



    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
    <script type="text/javascript" src="<?php echo constant('URL') ?>Public/Assets/js/tablaCorta.js?ver=1.1.12"></script>

</body>
</html>