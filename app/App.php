<?php
    class App {
        private $controller, $action, $params, $route;
        function __construct() {
            global $routes;
            $this->route = new route();
            if($routes['default_controller']){
                $this->controller = $routes['default_controller'];
            }
            $this->action = 'index';
            $this->params = [];
            $this->handleUrl();
        }
        function getUrl() {
            if(!empty($_SERVER['PATH_INFO'])){
                $url = $_SERVER['PATH_INFO'];
            } else {
                $url =  '/';
            }
            return $url;
        }
        function handleUrl(){
            $url = trim($this->getUrl(), '/');
            $url = $this->route->handleRoute($url);
            
            $urlArr = array_filter(explode('/',$url));
            $urlArr = array_values($urlArr);
            
            if(!empty($urlArr[0])){
                $this->controller = ucfirst($urlArr[0]);
            }

            if(file_exists('./app/controllers/'.$this->controller.'Controller.php')){
                require_once('./app/controllers/'.$this->controller.'Controller.php');
                if(class_exists($this->controller)){
                    $this->controller = new $this->controller;
                    unset($urlArr[0]);
                } else {
                    require_once './app/errors/404.php';
                }
            } else {
                require_once './app/errors/404.php';
            }

            if(!empty($urlArr[1])){
                $this->action = $urlArr[1];
                if(method_exists($this->controller, $this->action)){
                    unset($urlArr[1]);
                } else {
                    require_once './app/errors/404.php';
                }
            }
            $this->params = array_values($urlArr);

            if(method_exists($this->controller, $this->action)){
                call_user_func_array([$this->controller, $this->action], $this->params);
            } else {
                require_once './app/errors/404.php';
            }

        }
    }
?>