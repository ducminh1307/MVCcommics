<?php
    class Follow extends controller {
        public $theodoi;
        public $request;
        public $menu;
        public $theloai;
        public function __construct() {
            $this->theodoi = $this->model('theodoiModel');
            $this->menu = $this->model('menuModel');
            $this->theloai = $this->model('theloaiModel');
            $this->request = new Request();
        }
        public function loadFollow() {
            $user = $this->request->getFields()['user'];
            $idtr = $this->request->getFields()['id'];
            $check = $this->theodoi->checkFollow($user, $idtr);
            if($check) {
                $output = '<button class="chucnang mt-2" id="unfollow" data-id="'.$idtr.'"><i class="fa fa-heart" style="color: #f33"></i> Hủy theo dõi</button>';
            } else {
                $output = '<button class="chucnang mt-2" id="follow" data-id="'.$idtr.'"><i class="far fa-heart"></i> Theo dõi</button>';
            }
            echo json_encode($output);
        }
        public function addFollow() {
            $user = $this->request->getFields()['user'];
            $idtr = $this->request->getFields()['id'];
            $this->theodoi->addFollow($user, $idtr);
        }
        public function unFollow() {
            $user = $this->request->getFields()['user'];
            $idtr = $this->request->getFields()['id'];
            $this->theodoi->deleteFollow($user, $idtr);
        }
        public function unnFollow(){
            $mess = '';
            $id = $this->request->getFields()['idtd'];
            $this->theodoi->removeFollow($id);
            $truyentd = $this->theodoi->getFollow($_SESSION['acc']['tendangnhap']);
            if($truyentd == false) {
                $mess = "Bạn chưa theo dõi truyện nào!";
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
    }
?>