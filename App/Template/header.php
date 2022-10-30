
    <header>
        <ul>
            <li><a href="<?php echo constant('URL'); ?>main">Inicio</a></li>
            <li><a href="<?php echo constant('URL'); ?>consulta">Consulta</a></li>
        
        
        <?php #INICIO - ADMINISTRADOR ROL
            //if($_SESSION['rol'] == 1){
        ?>
            <li><a href="<?php //echo constant('URL'); ?>ayuda">Ayuda</a></li>
        <?php
            //}
        #FIN - ADMINISTRADOR ROL ?>
        </ul>
    </header>
<!-- </body>
</html> -->