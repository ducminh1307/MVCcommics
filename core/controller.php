<?php
    class controller {
        public function model($model){
            if(file_exists(_DIR_ROOT.'/app/models/'.$model.'.php')){
                require_once _DIR_ROOT.'/app/models/'.$model.'.php';
                return new $model;
            } else {
                require_once './app/errors/404.php';
            }
        }
        public function view($view, $data=[]){
            extract($data);
            if(file_exists(_DIR_ROOT.'/app/views/'.$view.'.php')){
                require_once _DIR_ROOT.'/app/views/'.$view.'.php';
            } else {
                require_once './app/errors/404.php';
            }
        }
    }