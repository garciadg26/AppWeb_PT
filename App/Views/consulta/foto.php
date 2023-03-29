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
                    <h4 class="tit_2">Curso : <?php echo $this->curso->nombreC; ?></h4>
                </div>
            </div>

            <!-- Panel inferior -->
            <div class="panel_inferior">

                <!-- FORMULARIO ACTUALIZAR CURSO -->
                <div class="panel_central_left_30">
                    <div class="cont_descrip_alta">
                        <a class="btn_general btn_regresar btn_icon_reverse" href="<?php echo constant('URL') ?>consulta/verCurso/<?php echo $this->curso->idC; ?>">
                            <img src="<?php echo constant('URL') ?>Public/Assets/images/svg/Icon-arrow-next.svg" alt="">
                            REGRESAR
                        </a>
                        <div class="vacio"></div>
                    </div>
                    <p class="txt_descripcion">Subir nueva foto</p>
                    <div ><?php echo $this->mensaje; ?></div>
                    <!-- FOTO DEL CURSO -->
                    <div class="cont_cover_curso">
                        <?php 
                            foreach($this->fotos as $row)
                        {
                            $fotos = new Curso();
                            $fotos = $row;
                        ?>
                            <?php  if($this->curso->fotoC == $fotos->idFoC) {
                            ?>
                                <img class="img_foto_consulta_curso" src="<?php echo constant('URL') . $fotos->urlFoC;?>" alt="">
                            <?php break; }
                            ?>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- FORMULARIO PARA DAR DE ALTA -->
                    <!-- <form id="form_actualizar_curso" class="form_general" action="<?php //echo constant('URL'); ?>consulta/actualizarCurso" method="POST"> -->
                    <form id="form_img" class="form_general" action="<?php echo constant('URL') ?>consulta/subirImg" method="post" enctype="multipart/form-data">
                        <!-- <p class="txt_descripcion_p">Imagen de portada</p> -->
                        <label for="foto"> Selecciona una imagen <br>
                            <input id="foto" name="foto" type="file">
                        </label>
                        <div class="form_general_row">
                            <div class="col_12">
                                <label for="titNameINP"> Título de la foto <br>
                                    <input id="titNameINP" name="titNameINP" type="text">
                                </label>
                            </div>
                        </div>
                        <?php if(isset($error)): ?>
                            <p class="error"><?php echo $error; ?></p>
                        <?php endif ?>
                        <div class="btn_form btn_form_actualizar">
                            <input type="submit" value="Subir foto">
                        </div>
                    </form>
                </div>
                <!-- INFORMACION DEL CURSO -->
                <div class="panel_central_right_70">
                    <p class="txt_descripcion_p">Seleccionar foto de la galería</p>
                    <form id="form_img" class="form_general" action="<?php echo constant('URL') ?>consulta/actualizarFotoC" method="post">
                        <div class="cont_form_galeria">
                            <?php foreach($this->fotos as $row)
                            {
                                $fotos = new Curso();
                                $fotos = $row;
                            ?>
                                <div class="group_form_img">
                                    <label class="card_img" for="foto_curso<?php echo $fotos->idFoC;?>">
                                        <input class="cover_img" id="foto_curso<?php echo $fotos->idFoC;?>" type="radio" name="fotoINP_curso" value="<?php echo $fotos->idFoC;?>" />
                                        <p class="txt_caption"><?php echo $fotos->nombreFoC; ?></p>
                                        <a class="btn_general btn_eliminar_foto btn_icon m0-auto" onclick="return confirmEliminar()" href="<?php echo constant('URL') . 'consulta/eliminarCover/'  . $fotos->idFoC ?>">
                                            <img src="<?php echo constant('URL')?>Public/Assets/images/svg/icono_eliminar_botones.svg" alt="">    
                                        </a>
                                        <img src="<?php echo constant('URL') . $fotos->urlFoC;?>" alt="">
                                    </label>
                                </div>
                            <?php
                            } 
                            ?>
                        </div>
                        <div class="btn_form btn_form_subir">
                            <input type="submit" value="Actualizar foto">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
</body>
</html>