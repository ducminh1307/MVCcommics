<?php
    class Chap extends controller {
        public $chuong;
        public $menu;
        public $theloai;
        public $request;
        public $response;
        public $binhluan;
        public $lichsu;
        public function __construct() {
            $this->chuong = $this->model('chuongModel');
            $this->menu = $this->model('menuModel');
            $this->theloai = $this->model('theloaiModel');
            $this->binhluan = $this->model('binhluanModel');
            $this->lichsu = $this->model('lichsuModel');
            $this->request = new Request();
            $this->response = new Response();
        }
        public function index($slugtr, $slugch){
            $data = $this->chuong->getXChuong($slugtr, $slugch);
            $cookieName = 'chuong'.$data['idchuong'];
            if(!isset($_COOKIE[$cookieName])){
                setcookie("$cookieName","1",time()+300);
                $this->chuong->viewChuong($data['idchuong']);
            }
            if(isset($_SESSION['acc'])) {
                $user = $_SESSION['acc']['tendangnhap'];
                if($this->lichsu->check($user, $data['idtruyen']) != false){
                    $this->lichsu->updateLichsu($user, $data['idtruyen'], $data['idchuong']);
                } else {
                    $this->lichsu->addLichsu($user, $data['idtruyen'], $data['idchuong']);
                }
            }
            if(!empty($data)){
                $this->view('layouts/home_layout', [
                    'data'=>[
                        'header'=>[
                            'menu'=> $this->menu->getAll(),
                            'theloai'=> $this->theloai->getAll(),
                        ],  
                        'body'=> [
                            'slugch'=> $slugch,
                            'list'=> $this->chuong->getAll($slugtr),
                            'chap'=> $data
                        ]
                    ],
                    'page'=>'home/chap',
                    'title'=> $data['tentruyen'].' | '.$data['tenchuong']
                ]);
            } else {
                $this->view('./app/errors/404');
            }
        }
        public function addBinhluan() {
            $idchuong = $this->request->getFields()['idchuong'];
            $user = $this->request->getFields()['user'];
            $content = $this->request->getFields()['content'];
            $this->binhluan->addBinhluan($idchuong, $user, $content);
        }
        public function loadBinhluan(){
            if($this->request->isPost()){
                $limit = 6;
                $idch = $this->request->getFields()['idchuong'];
                $pages = $this->binhluan->totalPage($idch, $limit);
                if(isset($this->request->getFields()['page'])) {
                    $page = $this->request->getFields()['page'];
                } else {
                    $page = 1;
                }
                $output = '<div class="comments">';
                $data = $this->binhluan->loadBinhluan($idch, $page, $limit);
                foreach ($data as $bl) {
                    $output .= '<div class="comment-item d-flex">
                                    <div class="ava mt-1">
                                        <img src="'._WEB_PUBLIC.'/clients/images/logo/'.$bl['anhhienthi'].'" alt="a">
                                    </div>
                                    <div class="comment-content p-1 ml-2">
                                        <div class="comment-top">'.$bl['tenhienthi'].' <span>'.time_stamp_chat($bl['ngaydang']).'</span></div>
                                        <div class="comment-bottom">'.$bl['noidung'].'</div>
                                    </div>
                                </div>';
                }
                $output .= '</div>';
                if($pages > 1){
                    $output .= '<div class="pagination">';
                    if($page > 3) {
                        $output .= '<a href="javascript:void(0);" data-page="1" class="page"><i class="fas fa-angle-double-left"></i></a>';
                    }
                    if($page > 1) {
                        $output .= '<a href="javascript:void(0);" data-page="'.($page-1).'" class="page"><i class="fas fa-angle-left"></i></a>';
                    }
                    for($i=1; $i <= $pages; $i++) {
                        if($i > $page - 3 && $i < $page + 3) {
                            if($page==$i){
                                $output .= '<a href="javascript:void(0);" data-page="'.$i.'" class="page active">'.$i.'</a>';
                            } else {
                                $output .= '<a href="javascript:void(0);" data-page="'.$i.'" class="page">'.$i.'</a>';
                            }
                        }
                    }
                    if($page < $pages) {
                        $output .= '<a href="javascript:void(0);" data-page="'.($page+1).'" class="page"><i class="fas fa-angle-right"></i></a>';
                    }
                    if($page < $pages-3) {
                        $output .= '<a href="javascript:void(0);" data-page="'.$pages.'" class="page"><i class="fas fa-angle-double-right"></i></a>';
                    }
                    $output .= '</div>';
                }
                echo json_encode($output);
            }
        }
    }
?>