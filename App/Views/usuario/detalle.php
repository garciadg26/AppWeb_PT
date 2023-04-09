<?php include_once __DIR__ . "/../../Includes/headHome.php"; ?>

    <!-- Contenedor -->
    <div class="cont_flex" id="panel_usuario">
        <!-- Aside -->
        <aside id="cont_aside">
            <?php include_once __DIR__ . "/../../Template/asideAlu.php" ?>
            <?php include_once __DIR__ . "/../../Template/asideFooter.php" ?>
        </aside>
        <!-- Panel principal -->
        <div id="cont_panel_principal_fijo">
            <?php
                $userName = $this->userSession->getCurrentUser();
                $this->user->setUser($userName);
                $sinV = "";
                $vacio = "Falta por completar";
            ?>
            <?php include_once __DIR__ . "/../../Template/menuSuperior.php" ?>
            <!-- Encabezado img -->
            <div class="encbezado_img"></div>
            <div id="panel_central">
                <!-- Panel inferior -->
                <div class="panel_inferior">

                    <!-- Formulario actualizar curso -->
                    <div class="panel_central_unico">
                        <h1 class="text-center">ACTUALIZACIÓN</h1>
                        <div class="cont_descrip_alta">
                            <a class="btn_general btn_regresar btn_icon_reverse" href="<?php echo constant('URL') ?>usuario">
                                <img src="<?php echo constant('URL') ?>Public/Assets/images/svg/Icon-arrow-next.svg" alt="">
                                REGRESAR
                            </a>
                            <p class="txt_descripcion">Ingresa la información necesaria para actualizar tu <b>perfil de usuario</b></p>
                            <div class="vacio"></div>
                        </div>
                        <form id="form_actualizar_user" class="form_general" action="" method="POST">
                            <!-- Primera fila -->
                            <div class="form_general_row">
                                <div class="col_3">
                                    <h2>Datos generales</h2>
                                </div>
                                <div class="col_9">
                                    <div class="form_general_row">
                                        <div class="col_4">
                                            <!-- Grupo: Nombre Usuario -->
                                            <div class="formulario__grupo" id="grupo__nombreUserINP">
                                                <label for="nombreUserINP" class="formulario__label">Nombre</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" class="formulario__input" name="nombreUserINP" id="nombreUserINP" value="<?php echo $this->user->getNombre(); ?>" placeholder="<?php echo $vacio; ?>" >
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">El nombre solo puede contener letras.</p>
                                            </div><br>
                                        </div>
                                        <div class="col_4">
                                            <!-- Grupo: Apellidos -->
                                            <div class="formulario__grupo" id="grupo__apellidosUserINP">
                                                <label for="apellidosUserINP" class="formulario__label">Apellidos</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" class="formulario__input" name="apellidosUserINP" id="apellidosUserINP" value="<?php echo $this->user->getApellido(); ?>" placeholder="<?php echo $vacio; ?>" >
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">Los apellidos solo puede contener letras.</p>
                                            </div><br>
                                        </div>
                                        <div class="col_4">
                                            <!-- Grupo: Correo electrónico -->
                                            <div class="formulario__grupo" id="grupo__emailUserINP">
                                                <label for="emailUserINP" class="formulario__label">Correo electrónico</label>
                                                <div class="formulario__grupo-input">
                                                    <p class="disabled_input"><?php echo $this->user->getUserName(); ?></p>
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">El correo solo puede contener letras, números, puntos, guiones y guion bajo.</p>
                                            </div><br>
                                        </div>
                                    </div>
                                    <div class="form_general_row">
                                        <div class="col_4">
                                            <!-- Grupo: Teléfono Celular -->
                                            <div class="formulario__grupo" id="grupo__celUserINP">
                                                <label for="celUserINP" class="formulario__label">Teléfono Celular</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" class="formulario__input" name="celUserINP" id="celUserINP" value="<?php echo $this->user->getTel() ? $this->user->getTel() : $sinV; ?>" placeholder="<?php echo $vacio; ?>" >
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">Solo se permite colocar números de 10 dígitos.</p>
                                            </div><br>
                                        </div>
                                        <div class="col_4">
                                            <!-- Grupo: Teléfono fijo y/o oficina -->
                                            <div class="formulario__grupo" id="grupo__telUserINP">
                                                <label for="telUserINP" class="formulario__label">Teléfono fijo y/o oficina</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" class="formulario__input" name="telUserINP" id="telUserINP" value="<?php echo $this->user->getTelFijo() ? $this->user->getTelFijo() : $sinV; ?>" placeholder="<?php echo $vacio; ?>" >
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">Solo se permite colocar números de 10 dígitos.</p>
                                            </div><br>
                                        </div>
                                        <div class="col_4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- Segunda fila -->
                            <div class="form_general_row">
                                <div class="col_3">
                                    <h2>Información personal</h2>
                                </div>
                                <div class="col_9">
                                    <div class="form_general_row">
                                        <div class="col_4">
                                            <!-- Grupo: Fecha de nacimiento -->
                                            <div class="formulario__grupo" id="grupo__fechaNaUserINP">
                                                <label for="fechaNaUserINP" class="formulario__label">Fecha de nacimiento</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="date" class="formulario__input" name="fechaNaUserINP" id="fechaNaUserINP" value="<?php echo $this->user->getFechaNacimiento() ? $this->user->getFechaNacimiento() : $sinV; ?>" >
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">La fecha sólo puede contener número.</p>
                                            </div><br>
                                        </div>
                                        <div class="col_4">
                                            <!-- Grupo: País -->
                                            <div class="formulario__grupo" id="grupo__paisUserINP">
                                                <label for="paisUserINP" class="formulario__label">País</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" class="formulario__input" name="paisUserINP" id="paisUserINP" value="<?php echo $this->user->getPais() ? $this->user->getPais() : $sinV; ?>" placeholder="<?php echo $vacio; ?>" >
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">El nombre del país solo puede contener letras.</p>
                                            </div><br>
                                        </div>
                                        <div class="col_4">
                                            <!-- Grupo: Cuidad -->
                                            <div class="formulario__grupo" id="grupo__ciudadUserINP">
                                                <label for="ciudadUserINP" class="formulario__label">Ciudado o Estado</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" class="formulario__input" name="ciudadUserINP" id="ciudadUserINP" value="<?php echo $this->user->getCiudad() ? $this->user->getCiudad() : $sinV; ?>" placeholder="<?php echo $vacio; ?>" >
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">La cuidad solo puede contener letras.</p>
                                            </div><br>
                                        </div>
                                    </div>
                                    <div class="form_general_row">
                                        <div class="col_6">
                                            <!-- Grupo: Dirección -->
                                            <div class="formulario__grupo" id="grupo__direccionUserINP">
                                                <label for="direccionUserINP" class="formulario__label">Dirección</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" class="formulario__input" name="direccionUserINP" id="direccionUserINP" value="<?php echo $this->user->getDireccion() ? $this->user->getDireccion() : $sinV; ?>" placeholder="<?php echo $vacio; ?>" >
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">La dirección puede contener letras y números.</p>
                                            </div><br>
                                        </div>
                                        <div class="col_3">
                                            <!-- Grupo: Código Postal -->
                                            <div class="formulario__grupo" id="grupo__codigoPoUserINP">
                                                <label for="codigoPoUserINP" class="formulario__label">Código postal</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" name="codigoPoUserINP" id="codigoPoUserINP" value="<?php echo $this->user->getCodigoPostal() ? $this->user->getCodigoPostal() : $sinV; ?>" placeholder="<?php echo $vacio; ?>" >
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">El Código Postal solo puede contener números.</p>
                                            </div><br>
                                        </div>
                                        <div class="col_3">
                                            <!-- Grupo: CURP -->
                                            <div class="formulario__grupo" id="grupo__curpUserINP">
                                                <label for="curpUserINP" class="formulario__label">CURP</label>
                                                <div class="formulario__grupo-input">
                                                    <input type="text" class="formulario__input" name="curpUserINP" id="curpUserINP" value="<?php echo $this->user->getCURP() ? $this->user->getCURP() : $sinV; ?>" placeholder="<?php echo $vacio; ?>" >
                                                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                                </div>
                                                <p class="formulario__input-error">El nombre solo puede contener letras en mayúscula y números.</p>
                                            </div><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn_form btn_form_actualizar">
                                <div class="formulario__mensaje" id="formulario__mensaje">
                                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Todos los campos deben completarse correctamente. </p>
                                </div>
                                <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">¡Actualización exitosa!</p>
                                <input type="submit" onclick="return confirmActualizar()" name="submit" value="Actualizar información">   
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
    <script type="text/javascript" src="<?php echo constant('URL'); ?>Public/Assets/js/validar/validarActualizarUser.js?ver=1.1.17"></script>
</body>
</html>