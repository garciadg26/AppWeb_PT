 <header class="cont_menu">
    <div class="acceso_usuario">
        <div class="info_user_top">
            <p><?php
                if($userTipo == 1){
                    $userID = 'Administrador';
                } else{
                    $userID = 'Alumno';
                }
                if($posConsulta !== false || $posaltaCurso !== false || $categoria !== false || $posaltaCategoria !== false){
                    $userN = $_SESSION['user'];
                    echo '<p class="txt_base_raleway">' . $userN . '</p>';
                    echo '<p class="txt_caption_tipo_user">' . $userID . '</p>';
                } else{
                    echo $userID;
                    echo $user->getUserName();
                    echo $user->getUserName();
                }
                    ?>
            </p>
        </div>
        <img src="<?php echo constant('URL') ?>Public/Assets/images/cover-instructor.png" alt="">
        <!-- <div class="mostrarMenu"> -->
            <ul class="subMenu_superior">
                <a class="item_subMenu_superior" href="<?php echo constant('URL') ?>usuario">
                    <li>
                        <svg id="icono_user" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13.5 14.999">
                            <g transform="translate(-5.25 -3.75)">
                                <path d="M1994,1423v-1.5a2.253,2.253,0,0,0-2.25-2.25h-6a2.251,2.251,0,0,0-2.25,2.25v1.5a.75.75,0,0,1-1.5,0v-1.5a3.75,3.75,0,0,1,3.75-3.749h6a3.754,3.754,0,0,1,3.749,3.749v1.5a.75.75,0,1,1-1.5,0Z" transform="translate(-1976.75 -1405)" fill="#aaa"/>
                                <path d="M1982,1421.5a3.75,3.75,0,1,1,3.75,3.75A3.754,3.754,0,0,1,1982,1421.5Zm1.5,0a2.25,2.25,0,1,0,2.25-2.25A2.252,2.252,0,0,0,1983.5,1421.5Z" transform="translate(-1973.75 -1414)" fill="#aaa"/>
                            </g>
                        </svg>
                        Mi perfil
                    </li>
                </a>
                <hr>
                <a class="item_subMenu_superior" href="<?php echo constant('URL') ?>App/Includes/logout.php">
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                            <path d="M10.022,14.3l1.089,1.089L15,11.5,11.111,7.611,10.022,8.7l2.022,2.022H4.5v1.556h7.505Zm6.922-9.8H6.056A1.56,1.56,0,0,0,4.5,6.056V9.167H6.056V6.056H16.944V16.945H6.056V13.833H4.5v3.111A1.56,1.56,0,0,0,6.056,18.5H16.944A1.56,1.56,0,0,0,18.5,16.944V6.056A1.56,1.56,0,0,0,16.944,4.5Z" transform="translate(-4.5 -4.5)" fill="#aaa"/>
                        </svg>
                        Cerrar sesión
                    </li>
                </a>
            </ul>
        <!-- </div> -->
    </div>   
 </header>