<?php
    class Ajax extends controller {
        public $truyen;
        public $chat;
        public $request;
        public $taikhoan;
        public $theodoi;
        function __construct(){
            $this->request = new Request();
            $this->truyen = $this->model('truyenModel');
            $this->chat = $this->model('chatModel');
            $this->taikhoan = $this->model('taikhoanModel');
            $this->theodoi = $this->model('theodoiModel');
        }
        public function searchTruyen(){
            $ten = $this->request->getFields()['search'];
            $data = $this->truyen->searchTruyen($ten);
            $output = '';
            if($data != false) {
                foreach ($data as $tr) {
                    $output .= '<a href="'._WEB_ROOT.'/truyen-tranh/'.$tr['slugtruyen'].'-'.$tr['idtruyen'].'" class="manga-item"><div class="img">';
                    $output .= '<img src="'._WEB_PUBLIC.'/clients/images/truyen/'.$tr['anhbia'].'?>" alt="">';
                    $output .= '</div><div class="name text-capitalize">'.$tr['tentruyen'].'</div></a>';
                }
            } else {
                $output = '<div class="manga-item">Không tìm thấy truyện</div>';
            }
            echo $output;
        }
        public function loadChat() {
            $data = $this->chat->loadAll();
            $output = '';
            if($data != false) {
                foreach ($data as $mess) {
                    $output .=' <div class="chat-item">';
                    $output .='<div class="chat-icon"><img src="'._WEB_PUBLIC.'/clients/images/logo/'.$mess['anhhienthi'].'" alt="" style="width:100%"></div>';
                    $output .='<div class="chat-content">';
                    $output .='<div class="d-flex"><span class="time">'.time_stamp_chat($mess['ngaydang']).'</span>';
                    $output .='<span class="user">'.$mess['tenhienthi'].':</span>';
                    $output .='</div>';
                    $output .='<span class="content">'.$mess['chatnoidung'].'</span>';
                    $output .='</div></div>';
                }
            } else {
                $output = '<div class="chat-item">Không có tin nhắn</div>';
            }
            echo $output;
        }
        public function chat(){
            $user = $this->request->getFields()['user'];
            $mess = $this->request->getFields()['mess'];
            $str = str_replace(' ','',$mess);
            if(!empty($str)) {
                $this->chat->addChat($user, $mess);
            }
        }
        public function addFollow() {
            $user = $this->request->getFields()['user'];
            $idtr = $this->request->getFields()['idtr'];
            $this->theodoi->addFollow($user, $idtr);
            $output = '<button class="chucnang mt-2" data-type="unfollow" value="'.$idtr.'"><i class="fa fa-heart" style="color: #f33"></i> Hủy theo dõi</button>';
            $output .= '<script>$(".chucnang").on("click", function(){
                            var chucnang = $(this);
                            var user = $("#username").val();
                            if(chucnang.data("type")=="addfollow") {
                                var url = $("#url").val() + "/ajax/addFollow";
                                var postData = {user: user, idtr: chucnang.val()};
                            } else {
                                var url = $("#url").val() + "/ajax/unFollow";
                                var postData = {user: user, idtr: chucnang.val()};
                            }
                            $.ajax({
                                url: url,
                                method: "POST",
                                data: postData,
                                success: function(data){
                                    $(".theodoi").html(data);
                                }
                            });
                        });</script>';
            echo $output;
        }
        public function unFollow() {
            $user = $this->request->getFields()['user'];
            $idtr = $this->request->getFields()['idtr'];
            $this->theodoi->deleteFollow($user, $idtr);
            $output = '<button class="chucnang mt-2" data-type="addfollow" value="'.$idtr.'"><i class="far fa-heart"></i> Theo dõi</button>';
            $output .= '<script>$(".chucnang").on("click", function(){
                            var chucnang = $(this);
                            var user = $("#username").val();
                            if(chucnang.data("type")=="addfollow") {
                                var url = $("#url").val() + "/ajax/addFollow";
                                var postData = {user: user, idtr: chucnang.val()};
                            } else {
                                var url = $("#url").val() + "/ajax/unFollow";
                                var postData = {user: user, idtr: chucnang.val()};
                            }
                            $.ajax({
                                url: url,
                                method: "POST",
                                data: postData,
                                success: function(data){
                                    $(".theodoi").html(data);
                                }
                            });
                        });</script>';
            echo $output;
        }
    }
?>