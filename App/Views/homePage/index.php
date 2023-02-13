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
    <div id="homePage" class="cont_flex">
        <aside id="cont_aside">
            <?php include_once __DIR__ . "/../../Template/asideAlu.php"; ?>
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
                    <p class="txt_base_raleway">Mejora cualquier habilidad </p>
                    <!-- LISTADO DE CURSOS -->
                    <div class="cont_grup_card_cursos">

                        <?php
                            //Importamos libreria de la clase curso  
                            
                            include_once 'App/Models/curso.php';
                            $cursos = [];
                            $cursos = $user->consultarCurso();
                            foreach($cursos as $row){
                                $cursos = new Curso();
                                $cursos = $row; 
                            
                        ?>
                        <div class="card_curso">
                            <img src="<?php echo constant('URL') ?>Public/Assets/images/cover_curso_default.jpg" alt="">
                            <h4 class="tit_5"><?php echo $cursos->nombreC; ?></h4>
                            <p class="txt_caption">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                            <div class="cont_datos_card">
                                <p class="card_curso_precio">$<?php echo $cursos->costoC; ?></p>
                                <p class="card_curso_duracion"><?php echo $cursos->duracionC; ?>hrs</p>
                            </div>
                            <div class="cont_info_card"></div>
                        </div>
                        <?php
                            }//Termina el ciclo Foreach  
                        ?>

                    </div>
                </div>
                
            </div>

        </div>

    </div>


        <?php //include_once __DIR__ . "/../../Includes/footer.php"; ?>

</body>
</html>