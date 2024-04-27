<?php
    class request {
        public function getMethod() {
            return $_SERVER['REQUEST_METHOD'];
        }
        public function isPost() {
            if($this->getMethod() == 'POST'){
                return true;
            }
            return false;
        }
        public function isGet() {
            if($this->getMethod() == 'GET'){
                return true;
            }
            return false;
        }
        public function getFields(){
            $dataFields = [];
            if($this->isPost()){
                if(!empty($_POST)){
                    foreach($_POST as $key=>$value){
                        if(is_array($value)){
                            $dataFields[$key] = filter_input(INPUT_POST, $key, FILTER_REQUIRE_ARRAY);
                        } else {
                            $dataFields[$key] = filter_input(INPUT_POST, $key);
                        }
                    }
                }
            }
            if($this->isGet()){
                if(!empty($_GET)){
                    foreach($_GET as $key=>$value){
                        if(is_array($value)){
                            $dataFields[$key] = filter_input(INPUT_GET, $key, FILTER_REQUIRE_ARRAY);
                        } else {
                            $dataFields[$key] = filter_input(INPUT_GET, $key);
                        }
                    }
                }
            }
            return $dataFields;
        }
        public function getFiles(){
            $files = [];
            if($this->isPost()){
                if(!empty($_FILES)){
                    foreach($_FILES as $key=>$value){
                        if(is_array($value)){
                            $files[$key] = filter_input(INPUT_POST, $key);
                        }
                    }
                }
            }
            return $files;
        }
    }
?>