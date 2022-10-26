<?php

    class Home extends Controller{
        public function __construct(){
            parent::__construct();
            $this->view->render('homePage/index');
        }
    }
?>