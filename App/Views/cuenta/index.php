




<?php include_once __DIR__ . "/../../Includes/headInicio.php"; ?>

    <h1>Esta es la vista de CREAR CUENTA</h1>

    <div class="container">
        <section class="cont_login">
            <h3>Crear cuenta</h3>
            <form action="<?php echo constant('URL'); ?>cuenta/crearUsuario" method="POST">
                    <?php
                    if(isset($errorCuenta)){
                        $errorCuenta;
                    }
                ?>
                </br>
                <label for="nombreA"> Nombre<br>
                    <input type="text" id="nombreA" name="nombreA" placeholder="Carlos" required>
                </label>
                <br>
                <br>
                <label for="apellidosA"> Apellidos <br>
                    <input type="text" id="apellidosA" name="apellidosA" placeholder="Estrada Molina" required>
                </label>
                <br>
                <br>
                <label for="celularA"> Telefono (opcional) <br>
                    <input type="text" id="celularA" name="celularA" placeholder="10 digitos">
                </label>
                <br>
                <br>
                <label for="emailA"> Email <br>
                    <input type="text" id="emailA" name="emailA" placeholder="ejemplo@gmail.com" required>
                </label>
                <br>
                <br>
                <label for="passA"> Contraseña <br>
                    <input type="password" id="passA" name="passA" placeholder="Tu contraseña debe ser segura" required>
                </label>
                <br>
                <br>
                <label for="passAR"> Repetir contraseña <br>
                    <input type="password" id="passAR" name="passAR" placeholder="Ingresa de nuevo tu contraseña" required>
                </label>
                <!-- <p class="olvidar_pas"><a href="#">Olvidé mi constraseña</a></p> -->
                <input type="submit" value="Crear">
            </form>
            
        </section>                                                       
    </div>
    <footer>
        <p class="foote_legales">© IAM 2022. Todos los derechos reservados.</p>
    </footer>


</body>
</html>
