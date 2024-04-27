<?php
    class Search extends controller {

        public $menu;
        public $theloai;
        public $truyen;
        public $request;
        public $response;

        public function __construct() {
            $this->menu = $this->model('menuModel');
            $this->theloai = $this->model('theloaiModel');
            $this->truyen = $this->model('truyenModel');
            $this->request = new Request();
            $this->response = new Response();
        }
        public function index($name, $page=1) {
            $limit = 12;
            $totalPage = $this->truyen->totalPage($name, $limit);
            $data = $this->truyen->pagingSearchTruyen($name, $page, $limit);
            if($data == false) {
                $data = "Không tìm thấy truyện này!";
            }
            $this->view('layouts/home_layout',[
                'data'=>[
                    'header'=>[
                        'menu'=> $this->menu->getAll(),
                        'theloai'=> $this->theloai->getAll(),
                    ],
                    'body'=> [
                        'page'=> $page,
                        'pages'=> $totalPage,
                        'search'=> $name,
                        'tr_s'=> $data
                    ]
                ],
                'page'=>'home/search',
                'title'=> 'Tìm kiếm'
            ]);
        }
        public function search() {
            $name = $this->request->getFields()['search'];
            $this->response->redirect('tim-kiem/'.$name);
        }
        public function searchByType($slug, $page=1) {
            $limit = 12;
            $totalPage = $this->truyen->totalPageType($slug, $limit);
            $data = $this->truyen->pagingTypeTruyen($slug, $page, $limit);
            if($data == false) {
                $data = "Không tìm thấy truyện này!";
            }
            $this->view('layouts/home_layout',[
                'data'=>[
                    'header'=>[
                        'menu'=> $this->menu->getAll(),
                        'theloai'=> $this->theloai->getAll(),
                    ],
                    'body'=> [
                        'page'=> $page,
                        'pages'=> $totalPage,
                        'type'=> $slug,
                        'type_name'=> $this->theloai->getnameType($slug),
                        'tr_s'=> $data
                    ]
                ],
                'page'=>'home/search',
                'title'=> 'Thể loại'
            ]);
        }
    }
?>