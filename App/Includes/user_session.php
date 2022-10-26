<?php

    class UserSession{
        public function __construct(){
            session_start();
        }

        //Poner un valor a la sesion actual
        public function setCurrentUser($user){
            $_SESSION['user'] = $user;
        }

        //Devolver la sesión
        public function getCurrentUser(){
            return $_SESSION['user'];
        }

        public function closeSession(){
            session_unset();
            session_destroy();
        }
    }
?>