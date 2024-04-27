<?php
    class Home extends controller {

        public $menu;
        public $theloai;
        public $truyen;
        public $binhluan;
        public $taikhoan;
        public $chuong;
        public $theodoi;
        public $lichsu;

        function __construct() {
            $this->menu = $this->model('menuModel');
            $this->theloai = $this->model('theloaiModel');
            $this->truyen = $this->model('truyenModel');
            $this->binhluan = $this->model('binhluanModel');
            $this->taikhoan = $this->model('taikhoanModel');
            $this->chuong = $this->model('chuongModel');
            $this->theodoi = $this->model('theodoiModel');
            $this->lichsu = $this->model('lichsuModel');
        }

        public function index() {
            $this->view('layouts/home_layout', [
                'data'=>[
                    'header'=>[
                        'menu'=> $this->menu->getAll(),
                        'theloai'=> $this->theloai->getAll(),
                    ],
                    'body'=> [
                        'tr_moi'=> $this->chuong->getChuongmoi(),
                        'tr_manga'=> $this->truyen->getTruyenHome('manga'),
                        'tr_manhua'=> $this->truyen->getTruyenHome('manhua'),
                        'tr_hot'=> $this->truyen->getTruyenhot()
                    ]
                ],
                'page'=>'home/home',
                'title'=> 'Trang chủ'
            ]);
        }

        public function truyen($slug, $id) {
            $data = $this->truyen->getTruyen($slug, $id);
            if(isset($_SESSION['acc'])){
                $td = $this->theodoi->checkFollow($_SESSION['acc']['tendangnhap'], $id);
            } else {
                $td = false;
            }
            if($data != false){
                $this->view('layouts/home_layout', [
                    'data'=>[
                        'header'=>[
                            'menu'=> $this->menu->getAll(),
                            'theloai'=> $this->theloai->getAll(),
                        ],
                        'body'=> [
                            'truyen'=>$data,
                            'the_loai'=> $this->theloai->getTheloai($id),
                            'chuong'=> $this->chuong->getChuong($id),
                            'chuongdau'=> $this->chuong->getFirstChuong($id),
                            'bl'=> $this->binhluan->getBinhluan($id),
                            'theodoi'=> $td
                        ]
                    ],
                    'page'=> 'home/detail',
                    'title'=> $data['tentruyen']
                ]);
            } else {
                $this->view('./app/errors/404');
            }
        }

        public function chuong($slugtr, $slugch, $id){
            $data = $this->chuong->getXChuong($slugtr, $slugch, $id);
            if(!empty($data)){
                $this->view('layouts/home_layout', [
                    'data'=>[
                        'header'=>[
                            'menu'=> $this->menu->getAll(),
                            'theloai'=> $this->theloai->getAll(),
                        ],  
                        'body'=> [
                            'chap'=> $this->chuong->getXChuong($slugtr, $slugch, $id)
                        ]
                    ],
                    'page'=>'home/chap',
                    'title'=> $this->chuong->getXChuong($slugtr, $slugch, $id)['tenchuong']
                ]);
            } else {
                $this->view('./app/errors/404');
            }
        }

        public function theodoi(){
            $mess = '';
            $truyentd = '';
            if(!isset($_SESSION['acc'])){
                $mess = "Bạn chưa đăng nhập!";
            } else {
                $truyentd = $this->theodoi->getFollow($_SESSION['acc']['tendangnhap']);
                if($truyentd == false) {
                    $mess = "Bạn chưa theo dõi truyện nào!";
                }
            }
            $this->view('layouts/home_layout', [
                'data'=>[
                    'header'=>[
                        'menu'=> $this->menu->getAll(),
                        'theloai'=> $this->theloai->getAll(),
                    ],
                    'body'=> [
                        'mess'=> $mess,
                        'truyen'=> $truyentd
                    ]
                ],
                'page'=>'home/follow',
                'title'=> 'Truyện theo dõi'
            ]);
        }

        public function lichsu() {
            if(isset($_SESSION['acc'])){
                $tr_h = $this->lichsu->getLichsu($_SESSION['acc']['tendangnhap']);
                if($tr_h !== false){
                    $data = $tr_h;
                } else {
                    $data = "Bạn chưa đọc truyện nào!";
                }
            } else {
                $data = 'Bạn hay đăng nhập để lưu lịch sử đọc!';
            }
            $this->view('layouts/home_layout', [
                'data'=>[
                    'header'=>[
                        'menu'=> $this->menu->getAll(),
                        'theloai'=> $this->theloai->getAll(),
                    ],
                    'body'=> [
                        'tr_h'=> $data
                    ]
                ],
                'page'=>'home/history',
                'title'=> 'Lịch sử đọc'
            ]);
        }

        public function truyenhot($page=1){
            $limit=18;
            $totalPage = $this->truyen->totalPageTruyenhot($limit);
            $data = $this->truyen->truyenhot($page, $limit);
            $this->view('layouts/home_layout', [
                'data'=>[
                    'header'=>[
                        'menu'=> $this->menu->getAll(),
                        'theloai'=> $this->theloai->getAll(),
                    ],
                    'body'=> [
                        'page'=> $page,
                        'pages'=> $totalPage,
                        'danhmuc'=>"/truyen-moi/",
                        'tr_h'=> $data
                    ]
                ],
                'page'=>'home/truyen',
                'title'=> 'Truyện hot'
            ]);
        }

        public function truyenmoi($page=1){
            $limit = 18;
            $totalPage = $this->truyen->totalPageTruyenmoi($limit);
            $data = $this->truyen->truyenmoi($page, $limit);
            $this->view('layouts/home_layout', [
                'data'=>[
                    'header'=>[
                        'menu'=> $this->menu->getAll(),
                        'theloai'=> $this->theloai->getAll(),
                    ],
                    'body'=> [
                        'page'=> $page,
                        'pages'=> $totalPage,
                        'danhmuc'=>"/truyen-hot/",
                        'tr_h'=> $data
                    ]
                ],
                'page'=>'home/truyen',
                'title'=> 'Truyện mới'
            ]);
        }
        
        public function truyenfull($page=1){
            $limit = 18;
            $totalPage = $this->truyen->totalPageTruyenmoi($limit);
            if($this->truyen->truyenfull($page, $limit) != false) {
                $data = $this->truyen->truyenfull($page, $limit);
            } else {
                $data = "Hiện web chưa đăng full truyện nào!";
            }
            $this->view('layouts/home_layout', [
                'data'=>[
                    'header'=>[
                        'menu'=> $this->menu->getAll(),
                        'theloai'=> $this->theloai->getAll(),
                    ],
                    'body'=> [
                        'page'=> $page,
                        'pages'=> $totalPage,
                        'danhmuc'=>"/truyen-full/",
                        'tr_h'=> $data
                    ]
                ],
                'page'=>'home/truyen',
                'title'=> 'Truyện mới'
            ]);
        }

    }
?>