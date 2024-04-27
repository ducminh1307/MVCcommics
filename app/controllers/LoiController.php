<?php
    class Loi extends controller {
        public $response;
        public function __construct() {
            $this->response = new Response();
        }
        public function err404() {
            require_once './app/errors/404.php';
        }
    }
?>