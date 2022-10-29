<?php include_once __DIR__ . "/../../Includes/headInicio.php"; ?>

    <h1>Esta es la vista de CREAR CUENTA</h1>
    <div class="container">
        <section class="cont_login">
            <h2>Crear cuenta</h2>
            <div ><?php echo $this->mensaje; ?></div>
            <?php

                echo "<div class='msnErrorLogin'>";
                for($i = 0; $i < count($this->campos); $i++){
                    echo "<li>".$this->campos[$i]."</li>";
                }
                echo "</div>";
            ?>

            <form action="<?php echo constant('URL'); ?>cuenta/crearUsuario" method="POST">

                </br>
                <label for="nombreA"> Nombre<br>
                    <input type="text" id="nombreA" name="nombreA" placeholder="Carlos" >
                </label>
                <br>
                <br>
                <label for="apellidosA"> Apellidos <br>
                    <input type="text" id="apellidosA" name="apellidosA" placeholder="Estrada Molina" >
                </label>
                <br>
                <br>
                <label for="celularA"> Telefono (opcional) <br>
                    <input type="text" id="celularA" name="celularA" placeholder="10 digitos">
                </label>
                <br>
                <br>
                <label for="emailA"> Email <br>
                    <input type="text" id="emailA" name="emailA" placeholder="ejemplo@gmail.com" >
                </label>
                <br>
                <br>
                <label for="passA"> Contraseña <br>
                    <input type="password" id="passA" name="passA" placeholder="Tu contraseña debe ser segura" >
                </label>
                <br>
                <br>
                <label for="passAR"> Repetir contraseña <br>
                    <input type="password" id="passAR" name="passAR" placeholder="Ingresa de nuevo tu contraseña" >
                </label>
                <!-- <p class="olvidar_pas"><a href="#">Olvidé mi constraseña</a></p> -->
                <input type="submit" name="submit" value="Crear cuenta">
            </form>
            <p>¿Deseas iniciar sesión?
                <a href="<?php echo constant('URL'); ?>">Iniciar sesión</a>
            </p>
        </section>                                                       
    </div>
    <footer>
        <p class="foote_legales">© IAM 2022. Todos los derechos reservados.</p>
    </footer>
    <script type="text/javascript" src="<?php echo constant('URL'); ?>Public/assets/js/formulario_cuenta.js"></script>    
</body>
</html>
