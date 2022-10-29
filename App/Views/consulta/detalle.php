    <?php include_once __DIR__ . "/../../Includes/headHome.php"; ?>
    <?php include_once __DIR__ . "/../../Includes/header.php"; ?>
    <h2>Actualizar curso</h2>
    <h3><?php echo $this->curso->nombreC; ?></h3>
    <h3>Bienvenido <?php //echo $user->getNombre(); ?></h3>

    <a href="<?php echo constant('URL'); ?>App/Includes/logout.php">Cerrar sesión</a>
    <div><?php echo $this->mensaje; ?></div>

    <?php
        echo "<div class='msnErrorLogin'>";
        for($i = 0; $i < count($this->validarCurActual); $i++){
            echo "<li>".$this->validarCurActual[$i]."</li>";
        }
        echo "</div>";
    ?>


    <form action="<?php echo constant('URL'); ?>consulta/actualizarCurso" method="POST">
        <p>
            <label for="nombreCursoINP">Nombre del curso</label><br>
            <input type="text" name="nombreCursoINP" value="<?php echo $this->curso->nombreC; ?>">
        </p>
        <p>
            <label for="costoCursoINP">Precio del curso</label><br>
            <input type="number" name="costoCursoINP" value="<?php echo $this->curso->costoC; ?>" >
        </p>
        <p>
            <label for="duracionCursoINP">Duración del curso</label><br>
            <input type="text" name="duracionCursoINP" value="<?php echo $this->curso->duracionC; ?>" > <p>hrs</p>
        </p>

        <div>
            <!-- SECCION DE CATEGORIAS -->
            <label for="catCursoINP">Categoría</label><br>
            <select name="catCursoINP" id="">
                <option value="">Seleccionar una categoría</option>
                    <?php          
                        foreach($this->categorias as $row)
                        {
                            $categorias = new Curso();
                            $categorias = $row;                 
                    ?>
                <option value="<?php echo $categorias->idCa; ?>" <?php if($this->curso->categoriaC == $categorias->idCa) echo "selected" ?>><?php echo $categorias->nombreCa; ?></option>
                    <?php
                        }
                    ?> 
            </select><br>
            <!-- SECCION DE TIPO -->
            <label for="tipoCursoINP">Tipo de curso</label><br>
            <select name="tipoCursoINP" id="">
                <option value="">Seleccionar un tipo</option>
                    <?php
                        foreach($this->tipos as $row)
                        {
                            $tipos = new Curso();
                            $tipos = $row;  
                    ?>
                <option value="<?php echo $tipos->idTi; ?>" <?php if($this->curso->tipoC == $tipos->idTi) echo "selected" ?>><?php echo $tipos->nombreTi; ?></option>
                    <?php
                        }
                    ?>
            </select><br>
            <!-- SECCION DE SOFTWARE -->
            <label for="softCursoINP">Software</label><br>
            <select name="softCursoINP" id="">
                <option value="">Seleccionar un software</option>
                    <?php
                        foreach($this->softwares as $row)
                        {
                            $softwares = new Curso();
                            $softwares = $row;  
                    ?>
                <option value="<?php echo $softwares->idSo; ?>" <?php if($this->curso->softwareC == $softwares->idSo) echo "selected" ?>><?php echo $softwares->nombreSo; ?></option>
                    <?php
                        }
                    ?>
            </select>
        </div>

        <p>
            <input type="submit" name="submit" value="Actualizar curso">
            
        </p>
    </form>
    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
</body>
</html>