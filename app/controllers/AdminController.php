<?php
    class Admin extends controller {
        public $menu;

        public function __construct() {
            $this->menu = $this->model('menuModel');
        }

        public function index() {
            $this->view('layouts/admin_layout',[
                'page'=> 'admin/dashboard',
                'page_header'=>'Thống kê',
                'body'=>[]
            ]);
        }
        public function menu() {
            $this->view('layouts/admin_layout',[
                'page'=> 'admin/menu',
                'page_header'=>'Quản lý menu',
                'body'=>[
                    'menu'=>$this->menu->getAll()
                ]
            ]);
        }public function fetch(){
            
        }
    }