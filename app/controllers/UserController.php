<?php
    class User extends controller {

        public $menu;
        public $theloai;
        public $taikhoan;
        public $response;
        public $request;

        public function __construct() {
            $this->menu = $this->model('menuModel');
            $this->theloai = $this->model('theloaiModel');
            $this->taikhoan = $this->model('taikhoanModel');
            $this->response = new Response();
            $this->request = new Request();
        }

        public function index() {
            if(session::checkSession('acc')){
                $this->response->redirect('trang-chu');
            } else {
                $this->view('layouts/home_layout', [
                    'header'=>[
                        'menu'=> $this->menu->getAll(),
                        'theloai'=> $this->theloai->getAll(),
                    ],
                    'body'=>[],
                    'page'=> 'user/login',
                    'title'=> 'Đăng nhập'
                ]);
            }
        }

        public function xulydangnhap(){
            if($this->request->isPost()){
                $user = $this->request->getFields()['user'];
                $pass = $this->request->getFields()['pass'];
                $mess="";
                $check = $this->taikhoan->checkUser($user);
                if($check!=false){
                    if(password_verify($pass, $check['matkhau'])){
                        session::setSession('acc', $this->taikhoan->getUser($user, $check['matkhau']));
                        if($this->request->getFields()['rem'] == 1){
                            setcookie('username', $user, time() + 3600*24);
                            setcookie('password', $pass, time() + 3600*24);
                        } else {
                            setcookie('username', $user, time()-60);
                            setcookie('password', $pass, time()-60);
                        }
                        $mess = '<script>window.location.href="'._WEB_ROOT.'/trang-chu"</script>';
                    } else {
                        $mess = "Tài khoản hoặc mật khẩu không chính xác!";
                    }
                } else {
                    $mess = "Tài khoản hoặc mật khẩu không chính xác!";
                }
                echo json_encode($mess);
            }
        }

        public function dangky() {
            $this->view('layouts/home_layout', [
                'header'=>[
                    'menu'=> $this->menu->getAll(),
                    'theloai'=> $this->theloai->getAll(),
                ],
                'body'=>[],
                'page'=> 'user/register',
                'title'=> 'Đăng ký'
            ]);
        }

        public function xulydangky() {
            if($this->request->isPost()){
                $mess="";
                $user = $this->request->getFields()['username'];
                $name = $this->request->getFields()['name'];
                $email = $this->request->getFields()['email'];
                $pass = $this->request->getFields()['password'];
                $captcha = $this->request->getFields()['captcha'];
                $logo = $this->request->getFields()['logo'];
                if($captcha != $_SESSION['captcha']){
                    $mess = "Mã xác thực không chính xác!";
                } else {
                    $hpass = password_hash($pass, PASSWORD_DEFAULT);
                    $rs = $this->taikhoan->addTaikhoan($user, $hpass, $name, $logo, $email);
                    if($rs) {
                        $data = $this->taikhoan->getUser($user, $hpass);
                        $_SESSION['acc'] = $data;
                        if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
                            setcookie('username', $user, time()+ 3600);
                            setcookie('password', $pass, time()+ 3600);
                        }
                        $mess = '<script>location.href="'._WEB_ROOT.'/trang-chu"</script>';
                    }
                }
                echo json_encode($mess);
            }
        }

        public function dangxuat(){
            $response = new Response();
            session::deleteSession('acc');
            $this->response->redirect('trang-chu');            
        }

        public function checkUser() {
            if($this->request->isPost()){
                $user = $this->request->getFields()['user'];
                $data = $this->taikhoan->checkTendangnhap($user);
                if(strlen($user) < 5){
                    echo '<span class="text-danger">&#10006; Tên đăng nhập phải lớn hơn 5 ký tự!</span>';
                } else {
                    if(strlen($user) > 20) {
                        echo '<span class="text-danger">&#10006; Tên đăng nhập phải nhỏ hơn 20 ký tự!</span>';
                    } else {
                        if(!$data) {
                            echo '<span class="text-danger">&#10006; Tên đăng nhập đã tồn tại!</span>';
                        }
                    }
                }
            }
        }

        public function checkEmail() {
            if($this->request->isPost()){
                $email = $this->request->getFields()['email'];
                $data = $this->taikhoan->checkEmail($email);
                if (preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@gmail.com$/", $email)) {
                    if(!$data) {
                        echo '<span class="text-danger">&#10006; Email đã tồn tại!</span>';
                    }
                } else {
                    echo '<span class="text-danger">&#10006; Email không hợp lệ!</span>';
                }
            }
        }

        public function profile(){
            $this->view('layouts/home_layout',[
                'header'=>[
                    'menu'=> $this->menu->getAll(),
                    'theloai'=> $this->theloai->getAll(),
                ],
                'body'=>['func'=>'profile'],
                'page'=>'home/profile',
                'title'=>'Thông tin cá nhân'
            ]);
        }

        public function changeProfile() {
            if($this->request->isPost()){
                $img = $this->request->getFields()['img'];
                $user = $this->request->getFields()['username'];
                $name = $this->request->getFields()['name'];
                $email = $this->request->getFields()['email'];
                $pass = $this->request->getFields()['pass'];
                $check = $this->taikhoan->checkUser($user);
                if(password_verify($pass, $check['matkhau'])){
                    $this->taikhoan->changeAcc($user, $name, $img, $email);
                    session::setSession('acc', $this->taikhoan->getUser($user,$check['matkhau']));
                    $mess = true;
                } else {
                    $mess = false;
                }
                $this->view('layouts/home_layout',[
                    'header'=>[
                        'menu'=> $this->menu->getAll(),
                        'theloai'=> $this->theloai->getAll(),
                    ],
                    'body'=>[
                        'mess'=>$mess,
                        'func'=>'profile'
                    ],
                    'page'=>'home/profile',
                    'title'=>'Thông tin cá nhân'
                ]);
            } else {
                $this->response->redirect('thong-tin-tai-khoan');
            }
        }

        public function pass() {
            $this->view('layouts/home_layout',[
                'header'=>[
                    'menu'=> $this->menu->getAll(),
                    'theloai'=> $this->theloai->getAll(),
                ],
                'body'=>[
                    'func'=>'pass'
                ],
                'page'=>'home/profile',
                'title'=>'Thay đổi mật khẩu'
            ]);
        }

        public function sendOTP() {
            if($this->request->isPost()){
                $user = $this->request->getFields()['user'];
                $this->taikhoan->setOTP($user);
                $acc = $this->taikhoan->checkUser($user);
                sendMail($acc);
            }
        }

        public function changePass(){
            if($this->request->isPost()){
                $opass = $this->request->getFields()['opass'];
                $otp = $this->request->getFields()['otp'];
                $npass = $this->request->getFields()['npass'];
                $rnpass = $this->request->getFields()['rnpass'];
                $check = $this->taikhoan->checkUser($_SESSION['acc']['tendangnhap']);
                if(password_verify($opass, $_SESSION['acc']['matkhau'])){
                    if($otp == $check['maxacthuc']){
                        if(strlen($npass) >= 5 && strlen($npass) <= 20){
                            if($npass == $rnpass){
                                $pass = password_hash($npass, PASSWORD_DEFAULT);
                                $this->taikhoan->changePass($_SESSION['acc']['tendangnhap'], $pass);
                                $_SESSION['acc'] = $this->taikhoan->checkUser($_SESSION['acc']['tendangnhap']);
                                if(isset($_COOKIE['password'])){
                                    setcookie('password', $npass, time()+ 3600);
                                }
                                $output = ['type'=>true, 'content'=>'Thay đổi mật khẩu thành công!'];
                                $this->taikhoan->setOTP($_SESSION['acc']['tendangnhap']);
                            } else {
                                $output = ['type'=>false, 'content'=>'Mật khẩu nhập lại không đúng!'];
                                $this->taikhoan->setOTP($_SESSION['acc']['tendangnhap']);
                            } 
                        } else {
                            if(strlen($npass) < 5) {
                                $output = ['type'=>false, 'content'=>'Mật khẩu phải trên 5 ký tự!'];
                                $this->taikhoan->setOTP($_SESSION['acc']['tendangnhap']);
                            }
                            if(strlen($npass) > 20) {
                                $output = ['type'=>false, 'content'=>'Mật khẩu phải nhỏ hơn 20 ký tự!'];
                                $this->taikhoan->setOTP($_SESSION['acc']['tendangnhap']);
                            }
                        }
                    } else {
                        $output = ['type'=>false, 'content'=>'OTP không dúng'];
                        $this->taikhoan->setOTP($_SESSION['acc']['tendangnhap']);
                    }
                } else {
                    $output = ['type'=>false, 'content'=>'Mật khẩu không dúng!'];
                    $this->taikhoan->setOTP($_SESSION['acc']['tendangnhap']);
                }
                if($output['type']){
                    $mess['status'] = true;
                    $mess['content'] = '<div class="alert alert-success">'.$output['content'].'</div>';
                } else {
                    $mess['status'] = false;
                    $mess['content'] = '<div class="alert alert-danger">'.$output['content'].'</div>';
                }
                echo json_encode($mess);
            } else {
                $this->response->redirect("thay-doi-mat-khau");
            }
        }

        public function forgot() {
            $this->view('layouts/home_layout', [
                'header'=>[
                    'menu'=> $this->menu->getAll(),
                    'theloai'=> $this->theloai->getAll(),
                ],
                'body'=>[],
                'page'=> 'user/forgotpass',
                'title'=> 'Quên mật khẩu'
            ]);
        }

        public function checkEmailProfile() {
            if($this->request->isPost()){
                $user = $this->request->getFields()['user'];
                $email = $this->request->getFields()['email'];
                $check = $this->taikhoan->checkUser($user);
                $data = $this->taikhoan->checkEmail($email);
                if (preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@gmail.com$/", $email)) {
                    if(!$data) {
                        if($email != $check['email']){
                            echo '<span class="text-danger">&#10006; Email đã tồn tại!</span>';
                        }
                    }
                } else {
                    echo '<span class="text-danger">&#10006; Email không hợp lệ!</span>';
                }
            }
        }

        public function checkEmailForgot() {
            if($this->request->isPost()){
                $email = $this->request->getFields()['email'];
                $data = $this->taikhoan->checkEmail($email);
                if (preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@gmail.com$/", $email)) {
                    if(!$data) {
                        $mess = array('status'=>true, 'content'=>'');
                        $this->taikhoan->setOTPEmail($email);
                        sendOTP($email, $this->taikhoan->getOTPEmail($email)['maxacthuc']);
                    } else {
                        $mess = array('status'=>false, 'content'=>'Email không tồn tại!');
                    }
                } else {
                    $mess = array('status'=>false, 'content'=>'Email không hợp lệ!');
                }
                echo json_encode($mess);
            }
        }

        public function forgotPass(){
            if($this->request->isPost()){
                $email = $this->request->getFields()['email'];
                $otp = $this->request->getFields()['otp'];
                $npass = $this->request->getFields()['npass'];
                $rnpass = $this->request->getFields()['rnpass'];
                if($this->taikhoan->getOTPEmail($email)['maxacthuc'] == $otp){
                    if(strlen($npass) >= 5 && strlen($npass) <= 20 ){
                        if($npass == $rnpass){
                            $password = password_hash($npass, PASSWORD_DEFAULT);
                            $this->taikhoan->changePassEmail($email, $password);
                            $mess = array('status'=>true, 'content'=>'Đổi mật khẩu thành công!');
                            $this->taikhoan->setOTPEmail($email);
                        } else {
                            $mess = array('status'=>false, 'content'=>'Mật khẩu nhập lại không đúng!');
                            $this->taikhoan->setOTPEmail($email);
                        }
                    } else {
                        if(strlen($npass) < 5) {
                            $mess = ['status'=>false, 'content'=>'Mật khẩu phải lớn hơn 5 ký tự!'];
                            $this->taikhoan->setOTPEmail($email);
                        }
                        if(strlen($npass) > 20) {
                            $mess = ['status'=>false, 'content'=>'Mật khẩu phải nhỏ hơn 20 ký tự!'];
                            $this->taikhoan->setOTPEmail($email);
                        }
                    }
                } else {
                    $this->taikhoan->setOTPEmail($email);
                    $mess = array('status'=>false, 'content'=>'OTP không chính xác!');
                }
                echo json_encode($mess);
            }
        }

    }
?>