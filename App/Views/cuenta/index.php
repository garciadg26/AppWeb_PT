<?php include_once __DIR__ . "/../../Includes/headLogin.php"; ?>


    <div class="container bgc_ilus_cuenta" id="cont_login">
        <section class="cont_login">
            <div class="cont_tit_cuenta">
                <h4 class="tit_3">Crear cuenta</h4>
                <p class="new_cuenta">¿Deseas iniciar sesión?<a href="<?php echo constant('URL'); ?>">Iniciar sesión</a>
                </p>
            </div>

            <div ><?php echo $this->mensaje; ?></div>
            <?php

                echo "<div class='msnErrorLogin'>";
                for($i = 0; $i < count($this->campos); $i++){
                    echo "<li>".$this->campos[$i]."</li>";
                }
                echo "</div>";
            ?>

            <form id="form_crear_cuenta" class="form_general" action="<?php echo constant('URL'); ?>cuenta/crearUsuario" method="POST">

                <div class="form_general_row1">
                    <div class="row1_col1">
                        <label for="nombreA"> Nombre</label>
                        <input type="text" id="nombreA" name="nombreA" placeholder="Alfredo" value="<?php echo $this->nombreA?>">
                    </div>
                    <div class="row1_col2">
                        <label for="celularA"> Telefono</label>
                        <input type="number" id="celularA" name="celularA" placeholder="10 digitos" value="<?php echo $this->celularA?>">
                    </div>
                </div>
                <div class="form_general_row2">
                    <div class="row2_col1">
                        <label for="apellidosA"> Apellidos</label>
                        <input type="text" id="apellidosA" name="apellidosA" placeholder="Estrada Molina" value="<?php echo $this->apellidosA?>">
                    </div>
                </div>
                <div class="form_general_row3">
                    <div class="row3_col1">
                        <label for="emailA"> Email</label>
                        <input type="text" id="emailA" name="emailA" placeholder="ejemplo@gmail.com" value="<?php echo $this->emailA?>">
                    </div>
                </div>
                <div class="form_general_row4">
                    <div class="row4_col1">
                        <label for="passA"> Contraseña</label>
                        <input type="password" id="passA" name="passA" placeholder="Tu contraseña debe ser segura" >
                    </div>
                    <div class="row4_col2">
                        <label for="passAR"> Repetir contraseña</label>
                        <input type="password" id="passAR" name="passAR" placeholder="Ingresa de nuevo tu contraseña" >
                    </div>
                </div>
 
                <!-- <p class="olvidar_pas"><a href="#">Olvidé mi constraseña</a></p> -->
                <div class="btn_form btn_form_crear">
                    <input type="submit" name="submit" value="Crear cuenta">
                </div>
            </form>

        </section>                                                       
    </div>
    <footer id="cont_foot_login">
        <p class="foote_legales">© IAM 2022. Todos los derechos reservados.</p>
    </footer>
    <script type="text/javascript" src="<?php echo constant('URL'); ?>Public/assets/js/scriptAlturaLogin.js"></script>    
</body>
</html>
