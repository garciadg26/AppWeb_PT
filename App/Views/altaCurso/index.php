<?php include_once 'App/models/curso.php'; ?>
    <?php include_once __DIR__ . "/../../Includes/head.php"; ?>
    <?php include_once __DIR__ . "/../../Includes/header.php"; ?>
    
    <h2>Registrar nuevo curso</h2>
    <h3>Bienvenido <?php echo $user->getNombre(); ?></h3>
    <a href="<?php echo constant('URL'); ?>App/Includes/logout.php">Cerrar sesión</a>

    
    <div ><?php //MENSAJE DE ERROR 
        echo $this->mensaje; 
    ?></div>

    <?php
        echo "<div class='msnErrorLogin'>";
        for($i = 0; $i < count($this->validarCursos); $i++){
            echo "<li>".$this->validarCursos[$i]."</li>";
        }
        echo "</div>";
    ?>


    <!-- INICIO - FORMULARIO -->
    <form action="<?php echo constant('URL'); ?>altaCurso/crearCurso" method="POST">
        <p>
            <label for="nomCursoINP">Nombre del curso</label><br>
            <input type="text" name="nomCursoINP" id="" value="<?php echo $this->nomCurso ?>">
        </p>
        <p>
            <label for="cosCursoINP">Costo del curso</label><br>
            <input type="number" name="cosCursoINP" id="" value="<?php echo $this->costoCurso ?>">
        </p>
        <p>
            <label for="durCursoINP">Duración del curso</label><br>
            <input type="number" name="durCursoINP" id="" value="<?php echo $this->durCurso ?>">
        </p>
        <p>
            <label for="catCursoINP">Categoría</label><br>
            <!-- SECCION DE CATEGORIAS -->
            <select name="catCursoINP" id="">
                <option value="">Seleccionar una categoría</option>
                    <?php          
                        foreach($this->categorias as $row)
                        {
                            $categorias = new Curso();
                            $categorias = $row;                 
                    ?>
                <option value="<?php echo $categorias->idCa; ?>" <?php if($this->catCurso == $categorias->idCa) echo "selected" ?>><?php echo $categorias->nombreCa; ?></option>
                    <?php
                        }
                    ?> 
            </select><br>
            <label for="catCursoINP">Tipo de curso</label><br>
            <select name="tipoCursoINP" id="">
                <!-- SECCION DE TIPO -->
                <option value="">Seleccionar un tipo</option>
                    <?php
                        foreach($this->tipos as $row)
                        {
                            $tipos = new Curso();
                            $tipos = $row;  
                    ?>
                <option value="<?php echo $tipos->idTi; ?>" <?php if($this->tipoCurso == $tipos->idTi) echo "selected" ?>><?php echo $tipos->nombreTi; ?></option>
                    <?php
                        }
                    ?>
            </select><br>
            <label for="catCursoINP">Software</label><br>
            <select name="softCursoINP" id="">
                <option value="">Seleccionar un software</option>
                    <?php
                        foreach($this->softwares as $row)
                        {
                            $softwares = new Curso();
                            $softwares = $row;  
                    ?>
                <option value="<?php echo $softwares->idSo; ?>" <?php if($this->softCurso == $softwares->idSo) echo "selected" ?>><?php echo $softwares->nombreSo; ?></option>
                    <?php
                        }
                    ?>
            </select>
        </p>

        <p>
            <input type="submit" name="submit" value="Registrar curso">
        </p>
    </form>
    <?php include_once __DIR__ . "/../../Includes/footer.php"; ?>
</body>
</html>