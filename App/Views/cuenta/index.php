<?php include_once __DIR__ . "/../../Includes/headLogin.php"; ?>


    <div class="container bgc_ilus_cuenta" id="cont_login">
        <section class="cont_login">
            <div class="cont_tit_cuenta">
                <h4 class="tit_3">Crear cuenta</h4>
            </div>

            <!-- MENSAJE DE ERROR -->
            <div ><?php echo $this->mensaje; ?></div>
            <?php
                /*
                echo "<div class='msnErrorLogin'>";
                for($i = 0; $i < count($this->campos); $i++){
                    echo "<li>".$this->campos[$i]."</li>";
                }
                echo "</div>";*/
            ?>

            <form id="form_crear_cuenta" class="form_general" action="" method="POST" autocomplete="off">

                <div class="form_general_row">
                    <div class="col_12">
                        <!-- Grupo: Nombre -->
                        <div class="formulario__grupo" id="grupo__nombreA">
                            <label for="nombreA" class="formulario__label">Nombre</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="nombreA" id="nombreA" placeholder="John Doe" value="<?php echo $this->nombreA?>">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El nombre solo puede contener letras.</p>
                        </div>
                    </div>
                </div>
                <div class="form_general_row">
                    <div class="col_12">
                        <!-- Grupo: Nombre -->
                        <div class="formulario__grupo" id="grupo__apellidosA">
                            <label for="apellidosA" class="formulario__label">Apellidos</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="apellidosA" id="apellidosA" placeholder="Estrada Molina" value="<?php echo $this->apellidosA?>">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El apellido solo puede contener letras y espacios.</p>
                        </div>
                    </div>
                </div>
                <div class="form_general_row">
                    <div class="col_6">
                        <!-- Grupo: Correo Electronico -->
                        <div class="formulario__grupo" id="grupo__emailA">
                            <label for="emailA" class="formulario__label">Correo Electrónico</label>
                            <div class="formulario__grupo-input">
                                <input autocomplete="off" type="email" class="formulario__input" name="emailA" id="emailA" placeholder="ejemplo@correo.com" value="<?php echo $this->emailA?>">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
                        </div>
                    </div>
                    <div class="col_6">
                        <!-- Grupo: Teléfono -->
                        <div class="formulario__grupo" id="grupo__celularA">
                            <label for="celularA" class="formulario__label">Teléfono</label>
                            <div class="formulario__grupo-input">
                                <input type="tel" class="formulario__input" name="celularA" id="celularA" placeholder="4491234567" value="<?php echo $this->celularA?>">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Solo se permite colocar números de 10 dígitos.</p>
                        </div> 
                    </div>
                </div>
                <div class="form_general_row">
                    <div class="col_6">
                        <!-- Grupo: Contraseña -->
                        <div class="formulario__grupo" id="grupo__passA">
                            <label for="passA" class="formulario__label">Contraseña</label>
                            <div class="formulario__grupo-input">
                                <input type="password" class="formulario__input" name="passA" id="passA">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">La contraseña debe tener al menos 8 caracteres, una letra en mayúscula, un número y un carácter especial.</p>
                        </div>
                    </div>
                    <div class="col_6">
                        <!-- Grupo: Contraseña 2 -->
                        <div class="formulario__grupo" id="grupo__password2">
                            <label for="passAR" class="formulario__label">Repetir Contraseña</label>
                            <div class="formulario__grupo-input">
                                <input type="password" class="formulario__input" name="passAR" id="passAR">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
                        </div>
                    </div>
                </div>

                <div class="formulario__mensaje" id="formulario__mensaje">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                </div>
 
                <!-- <p class="olvidar_pas"><a href="#">Olvidé mi constraseña</a></p> -->
                <div class="btn_form btn_form_crear formulario__grupo formulario__grupo-btn-enviar">
                    <input type="submit" name="submit" value="Crear cuenta">
                    <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                </div>
                <p class="new_cuenta">¿Deseas iniciar sesión?<a href="<?php echo constant('URL'); ?>">Iniciar sesión</a>
            </form>
        </section>                                                       
    </div>
    <footer id="cont_foot_login">
        <p class="foote_legales">© IAM 2023. Todos los derechos reservados.</p>
    </footer>
    <script type="text/javascript" src="<?php echo constant('URL'); ?>Public/Assets/js/validacionForm.js?ver=1.1.10"></script>
</body>
</html>
