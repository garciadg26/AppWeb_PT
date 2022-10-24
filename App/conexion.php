<?php

    const DB_NAME = 'db_app_web_iam';
    const DB_USER = 'root';
    const DB_SERVIDOR = 'localhost';
    const DB_CHARSET = 'utf8';

    abstract class DB{
        private static $db_usuario = DB_USER;
        private static $db_pass = '';
        private static $db_servidor = DB_SERVIDOR;
        private static $db_nombre = '';
        private static $db_charset = DB_CHARSET;
    }

    

?>