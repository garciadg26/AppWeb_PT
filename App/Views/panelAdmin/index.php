

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
        <!-- Panel principal -->
        <div id="cont_panel_principal_fijo">
            <?php include_once __DIR__ . "/../../Template/menuSuperior.php"; ?>
            <!-- Panel principal -->
            <dvi id="panel_central">

                <div class="titulo_panel">
                    <h4 class="tit_2">Bienvenido : <?php echo $user->getNombre(); ?></h4>
                </div>

                <div class="cont_contadores_panel">
                    <div class="tarjeta_cont tarjeta_p_admin1">
                        <span class="cont_numero_ps">16</span>
                        <p class="cont_descriptivo_ps">Alumno</p>
                    </div>
                    <div class="tarjeta_cont tarjeta_p_admin2">
                        <span class="cont_numero_ps">6</span>
                        <p class="cont_descriptivo_ps">Instructores</p>
                    </div>
                    <div class="tarjeta_cont tarjeta_p_admin3">
                        <span class="cont_numero_ps">8</span>
                        <p class="cont_descriptivo_ps">Grupos</p>
                    </div>
                    <div class="tarjeta_cont tarjeta_p_admin4">
                        <span class="cont_numero_ps">24</span>
                        <p class="cont_descriptivo_ps">Cursos</p>
                    </div>
                </div>
            </dvi>
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
                        <a class="btn_general btn_principal btn_cursos_panel_admin" href="<?php echo constant('URL'); ?>consulta">VER CURSOS<i class="icon_flecha"></i></a>
                    </div>
                    <table id="tabla_panel_admin">
                        <thead class="titulo_tabla_panel">
                            <tr>
                                <th>Nombre</th>
                                <th>Costo</th>
                            </tr>
                        </thead>
                        <tbody class="cuerpo_tabla_panel">
                            <?php
                                //Importamos libreria de la clase curso  
                                
                                include_once 'App/models/curso.php';
                                $cursos = [];
                                $cursos = $user->consultarCurso();
                                foreach($cursos as $row){
                                    $cursos = new Curso();
                                    $cursos = $row; 
                                
                            ?>
                            <tr>
                                <td><?php echo $cursos->nombreC; ?></td>
                                <td>$<?php echo $cursos->costoC; ?></td>
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
</body>
</html>