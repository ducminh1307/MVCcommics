<?php
    class Quantri extends controller {
        public $menu;
        public $theloai;
        public $taikhoan;
        public $theodoi;
        public $truyen;
        public $chuong;
        public $binhluan;
        public $request;
        public $response;

        public function __construct() {
            $this->theloai = $this->model('theloaiModel');
            $this->menu = $this->model('menuModel');
            $this->taikhoan = $this->model('taikhoanModel');
            $this->theodoi = $this->model('theodoiModel');
            $this->truyen = $this->model('truyenModel');
            $this->chuong = $this->model('chuongModel');
            $this->binhluan = $this->model('binhluanModel');
            $this->request = new Request();
            $this->response = new Response();
        }

        public function index() {
            $this->checkAdmin();
            $this->view('layouts/admin_layout',[
                'page'=> 'admin/dashboard',
                'page_header'=>'Thống kê',
                'body'=>[
                    'thongke'=>[
                        'taikhoan'=>$this->taikhoan->thongke()[0],
                        'theodoi'=>$this->theodoi->thongke()[0],
                        'truyen'=>$this->truyen->thongke()[0],
                        'luotxem'=>$this->chuong->thongke()[0]
                    ]
                ]
            ]);
        }

        public function menu() {
            $this->checkAdmin();
            $this->view('layouts/admin_layout',[
                'page'=> 'admin/menu',
                'page_header'=>'Quản lý menu',
                'body'=>[]
            ]);
        }

        public function user() {
            $this->checkAdmin();
            $this->view('layouts/admin_layout',[
                'page'=> 'admin/user',
                'page_header'=>'Quản lý người dùng',
                'body'=>[]
            ]);
        }

        public function type() {
            $this->checkAdmin();
            $this->view('layouts/admin_layout',[
                'page'=> 'admin/type',
                'page_header'=>'Quản lý thể loại',
                'body'=>[]
            ]);
        }

        public function comic(){
            $this->checkAdmin();
            $theloai = $this->theloai->getAll();
            $this->view('layouts/admin_layout',[
                'page'=> 'admin/comic',
                'page_header'=>'Quản lý truyện',
                'body'=>[
                    'theloai'=>$theloai
                ]
            ]);
        }

        public function cmt(){
            $this->checkAdmin();
            $this->view('layouts/admin_layout',[
                'page'=> 'admin/comment',
                'page_header'=>'Quản lý bình luận',
                'body'=>[
                    'menu'=>$this->menu->getAll()
                ]
            ]);
        }

        public function loadMenu() {
            $data = $this->menu->getAll();
            $output = ' <thead>
                            <tr class="bg-danger text-light">
                                <th>STT</th>
                                <th>Tên danh mục</th>
                                <th>Slug danh mục</th>
                                <th>Hành động</th>
                            </tr>
                        </thead><tbody>';
            $i = 0;
            while ($i<count($data)){
                $output .= '<tr>
                                <td>'.($i+1).'</td>
                                <td>'.$data[$i]['tenmenu'].'</td>
                                <td>'.$data[$i]['slugmenu'].'</td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary" id="updatemenu" data-id="'.$data[$i]['idmenu'].'" data-bs-toggle="modal" data-bs-target="#editmenu"><i class="bi bi-pencil-fill"></i> Sửa</button>
                                    <button class="btn btn-outline-danger" data-id="'.$data[$i]['idmenu'].'" id="delete" data-bs-toggle="modal" data-bs-target="#deletemenu"><i class="bi bi-trash-fill"></i> Xóa</button>
                                </td>
                            </tr>';
                $i++;
            }
            $output .= '</tbody>';
            echo json_encode($output);
        }

        public function addMenu() {
            if($this->request->isPost()){
                $name = $this->request->getFields()['name'];
                $slug = $this->request->getFields()['slug'];
                $this->menu->addMenu($name, $slug);
            }
        }

        public function getMenu(){
            if($this->request->isPost()){
                $id = $this->request->getFields()['id'];
                $data = $this->menu->getMenu($id);
                echo json_encode($data);
            }
        }

        public function updateMenu() {
            if($this->request->isPost()){
                $id = $this->request->getFields()['id'];
                $name = $this->request->getFields()['name'];
                $slug = $this->request->getFields()['slug'];
                $this->menu->updateMenu($id, $name, $slug);
            }
        }

        public function deleteMenu() {
            if($this->request->isPost()){
                $id = $this->request->getFields()['id'];
                $this->menu->deleteMenu($id);
            }
        }
        
        public function loadType() {
            if($this->request->isPost()){
                $output = ['table'=>'', 'page'=>''];
                $limit = 10;
                $pages = $this->theloai->totalPage($limit);
                if(isset($this->request->getFields()['page'])) {
                    $page = $this->request->getFields()['page'];
                } else {
                    $page = 1;
                }
                $data = $this->theloai->getTypeAll($page,$limit);
                $output['table'] = '<thead>
                                        <tr class="bg-danger text-light">
                                            <th>Tên thể loại</th>
                                            <th>Slug thể loại</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead><tbody>';
                $i = 0;
                while ($i<count($data)){
                    $output['table'] .= '<tr>
                                            <td>'.$data[$i]['tentheloai'].'</td>
                                            <td>'.$data[$i]['slugtheloai'].'</td>
                                            <td>
                                                <button type="button" class="btn btn-outline-primary" id="updatetype" data-id="'.$data[$i]['idtheloai'].'" data-bs-toggle="modal" data-bs-target="#edittype"><i class="bi bi-pencil-fill"></i> Sửa</button>
                                                <button class="btn btn-outline-danger" data-id="'.$data[$i]['idtheloai'].'" id="delete" data-bs-toggle="modal" data-bs-target="#deletetype"><i class="bi bi-trash-fill"></i> Xóa</button>
                                            </td>
                                        </tr>';
                    $i++;
                }
                $output['table'] .= '</tbody>';
                $output['page'] = $this->page($page, $pages);
                echo json_encode($output);
            }
        }

        public function addType() {
            if($this->request->isPost()){
                $name = $this->request->getFields()['name'];
                $slug = $this->request->getFields()['slug'];
                $this->theloai->add($name, $slug);
            }
        }

        public function getType(){
            if($this->request->isPost()){
                $id = $this->request->getFields()['id'];
                $data = $this->theloai->getTheloai1($id);
                echo json_encode($data);
            }
        }

        public function updateType() {
            if($this->request->isPost()){
                $id = $this->request->getFields()['id'];
                $name = $this->request->getFields()['name'];
                $slug = $this->request->getFields()['slug'];
                $this->theloai->update($id, $name, $slug);
            }
        }

        public function deleteType() {
            if($this->request->isPost()){
                $id = $this->request->getFields()['id'];
                $this->theloai->delete($id);
            }
        }

        public function loadAcc(){
            $limit = 10;
            if($this->request->isPost()){
                $output = ['table'=>'', 'page'=>''];
                $pages = $this->taikhoan->totalPage($limit);
                if(isset($this->request->getFields()['page'])) {
                    $page = $this->request->getFields()['page'];
                } else {
                    $page = 1;
                }
                $data = $this->taikhoan->getAll($page, $limit);
                $output['table'] = '<thead>
                                        <tr class="bg-danger text-light">
                                            <th>Tên đăng nhập</th>
                                            <th>Tên hiển thị</th>
                                            <th>Ảnh hiển thị</th>
                                            <th>Email</th>
                                            <th>Quyền</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead><tbody>';
                foreach($data as $acc){
                    $output['table'] .='<tr>
                                            <td>'.$acc['tendangnhap'].'</td>
                                            <td>'.$acc['tenhienthi'].'</td>
                                            <td><img src="'._WEB_PUBLIC.'/clients/images/logo/'.$acc['anhhienthi'].'" style="width:50px"></td>
                                            <td>'.$acc['email'].'</td>';
                    if($acc['qtc']==1) {
                        $output['table'] .= '<td><button id="change" data-user="'.$acc['tendangnhap'].'" data-qtc="0" class="btn btn-success">Admin</button></td>';
                    } else {
                        $output['table'] .= '<td><button id="change" data-user="'.$acc['tendangnhap'].'" data-qtc="1" class="btn btn-danger">User</button></td>';
                    }          
                    $output['table'] .= '<td>
                                            <button type="button" class="btn btn-outline-primary" id="updateuser" data-user="'.$acc['tendangnhap'].'" data-bs-toggle="modal" data-bs-target="#edituser"><i class="bi bi-pencil-fill"></i> Sửa</button>
                                            <button class="btn btn-outline-danger" data-user="'.$acc['tendangnhap'].'" id="delete" data-bs-toggle="modal" data-bs-target="#deleteuser"><i class="bi bi-trash-fill"></i> Xóa</button>
                                        </td></tr>';
                }
                $output['page'] = $this->page($page, $pages);
                echo json_encode($output);
            }
        }

        public function changeQTC() {
            if($this->request->isPost()){
                $qtc = $this->request->getFields()['qtc'];
                $user = $this->request->getFields()['user'];
                $this->taikhoan->changeQTC($user, $qtc);
            }
        }

        public function getAcc() {
            if($this->request->isPost()){
                $user = $this->request->getFields()['user'];
                $data = $this->taikhoan->checkUser($user);
                echo json_encode($data);
            }
        }

        public function updateAcc() {
            if($this->request->isPost()){
                $user = $this->request->getFields()['user'];
                $name = $this->request->getFields()['name'];
                $email = $this->request->getFields()['email'];
                $img = $this->request->getFields()['img'];
                $this->taikhoan->changeAcc($user, $name, $img, $email);
            }
        }

        public function deleteAcc() {
            if($this->request->isPost()){
                $user = $this->request->getFields()['user'];
                $this->taikhoan->deleteAcc($user);
            }
        }

        public function loadCmt() {
            $limit = 7;
            if($this->request->isPost()){
                $output = ['table'=>'', 'page'=>''];
                $pages = $this->binhluan->totalPageAll($limit);
                if(isset($this->request->getFields()['page'])) {
                    $page = $this->request->getFields()['page'];
                } else {
                    $page = 1;
                }
                $data = $this->binhluan->loadBinhluanAll($page, $limit);
                $output['table'] = '<thead>
                                        <tr class="bg-danger text-light">
                                            <th>Tên đăng nhập</th>
                                            <th>Tên hiển thị</th>
                                            <th>Nội dung</th>
                                            <th>Ngày đăng</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead><tbody>';
                foreach($data as $cmt){
                    $output['table'] .='<tr>
                                            <td>'.$cmt['tendangnhap'].'</td>
                                            <td>'.$cmt['tenhienthi'].'</td>
                                            <td>'.$cmt['noidung'].'</td>
                                            <td>'.format_day_chat($cmt['ngaydang']).'</td>
                                            <td>
                                                <button class="btn btn-outline-danger" data-id="'.$cmt['idbinhluan'].'" id="delete" data-bs-toggle="modal" data-bs-target="#deleteuser"><i class="bi bi-trash-fill"></i> Xóa</button>
                                            </td>
                                        </tr>';
                }
                $output['page'] = $this->page($page, $pages);
                echo json_encode($output);
            }
        }

        public function deleteCmt(){
            if($this->request->isPost()){
                $id = $this->request->getFields()['id'];
                $this->binhluan->deleteBinhluan($id);
            }
        }

        public function loadTruyen() {
            if($this->request->isPost()){
                $output = ['table'=>'', 'page'=>''];
                $limit = 5;
                $pages = $this->truyen->totalPageAll($limit);
                if(isset($this->request->getFields()['page'])) {
                    $page = $this->request->getFields()['page'];
                } else {
                    $page = 1;
                }
                $tr = $this->truyen->getAll($page,$limit);
                $output['table'] = '<thead>
                                        <tr class="bg-danger text-light">
                                            <th>Tên truyện</th>
                                            <th>Slug truyện</th>
                                            <th>Ảnh bìa</th>
                                            <th>Tác giả</th>
                                            <th>Mô tả</th>
                                            <th>Trạng thái</th>
                                            <th>Ngày đăng</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead><tbody>';
                foreach ($tr as $data){
                    $output['table'] .= '<tr>
                                            <td class="text-capitalize">'.$data['tentruyen'].'</td>
                                            <td>'.$data['slugtruyen'].'</td>
                                            <td><img src="'._WEB_PUBLIC.'/clients/images/truyen/'.$data['anhbia'].'" style="width:70px"></td>
                                            <td>'.$data['tacgia'].'</td>
                                            <td class="tomtat">'.$data['tomtat'].'</td>';
                    if($data['trangthai']==1) {
                        $output['table'] .= '<td><button id="change" data-idtr="'.$data['idtruyen'].'" data-stt="0" class="btn btn-success" title="Hoàn tất">HT</button></td>';
                    } else {
                        $output['table'] .= '<td><button id="change" data-idtr="'.$data['idtruyen'].'" data-stt="1" class="btn btn-danger" title="Đang cập nhật">CN</button></td>';
                    } 
                    $output['table'] .='    <td>'.format_day_chat($data['ngaydang']).'</td>
                                            <td>
                                                <button type="button" class="btn btn-outline-success mb-2" id="targetchuong" data-id="'.$data['idtruyen'].'" data-bs-toggle="modal" data-bs-target="#chuong" title="Thêm chương"><i class="bi bi-plus-circle-fill"></i></button>
                                                <button type="button" class="btn btn-outline-primary mb-2" id="updatetruyen" data-id="'.$data['idtruyen'].'" data-bs-toggle="modal" data-bs-target="#edittruyen"  title="Sửa truyện"><i class="bi bi-pencil-fill"></i></button>
                                                <button class="btn btn-outline-danger" data-id="'.$data['idtruyen'].'" id="delete" data-bs-toggle="modal" data-bs-target="#deletetruyen" title="Xóa truyện"><i class="bi bi-trash-fill"></i></button>
                                            </td>
                                        </tr>';
                }
                $output['table'] .= '</tbody>';
                $output['page'] = $this->page($page, $pages);
                echo json_encode($output);
            }
        }

        public function addTruyen() {
            $types = array('jpg', 'jpeg','png');
            $path = 'public/assets/clients/images/truyen/';
            if($this->request->isPost()){
                // Lay du lieu
                $ten = $this->request->getFields()['ten'];
                $slug = $this->request->getFields()['slug'];
                $tacgia = $this->request->getFields()['tacgia'];
                $tomtat = $this->request->getFields()['tomtat'];
                $img= $_FILES['anhbia']['name'];
                $theloai = $this->request->getFields()['theloai'];
                $idtl = explode('#',$theloai);
                // xu ly anh
                $file_type = explode('.',$img);
                $type = end($file_type);
                if(in_array($type, $types)) {
                    $output = ['status'=>true, 'content'=>''];
                    $new_name = $slug.'.'.$type;
                    $img_tmp = $_FILES['anhbia']['tmp_name'];
                    move_uploaded_file($img_tmp,$path.$new_name);
                    $this->truyen->addTruyen($ten, $slug, $tacgia, $new_name, $tomtat);
                    $idtr = $this->truyen->getTruyenAdd($slug)['idtruyen'];
                    $this->theloai->addTheloaiTruyen($idtl, $idtr);
                } else {
                    $output = ['status'=>false, 'content'=>'File không đúng định dạng!'];
                }
                echo json_encode($output);
            }
        }

        public function deleteTruyen() {
            $path = 'public/assets/clients/images/truyen/';
            if($this->request->isPost()){
                $id = $this->request->getFields()['id'];
                $img = $this->truyen->getTruyenId($id)['anhbia'];
                unlink($path.$img);
                $this->truyen->delete($id);
            }
        }

        public function getTruyen() {
            if($this->request->isPost()){
                $id = $this->request->getFields()['id'];
                $output = $this->truyen->getTruyenId($id);
                $theloai = $this->theloai->getTheloai($id);
                $allTL = $this->theloai->getAll();
                $tltr = array();
                foreach($allTL as $tl){
                    if(in_array($tl, $theloai)){
                        $tltr[] = ['value'=>$tl['idtheloai'], 'label'=>$tl['tentheloai'], 'selected'=>true];
                    } else {
                        $tltr[] = ['value'=>$tl['idtheloai'], 'label'=>$tl['tentheloai'], 'selected'=>false];
                    }
                }
                $output['theloai'] = $tltr;
                echo json_encode($output);
            }
        }

        public function updatetruyen() {
            $types = array('jpg', 'jpeg','png');
            $path = 'public/assets/clients/images/truyen/';
            if($this->request->isPost()){
                // lay du lieu
                $idtr = $this->request->getFields()['up_id'];
                $ten = $this->request->getFields()['up_ten'];
                $slug = $this->request->getFields()['up_slug'];
                $tacgia = $this->request->getFields()['up_tacgia'];
                $tomtat = $this->request->getFields()['up_tomtat'];
                $theloai = $this->request->getFields()['up_theloai'];
                $idtl = explode('#',$theloai);
                // xu ly anh
                if(!empty($_FILES['up_anhbia']['name'])) {
                    $img= $_FILES['up_anhbia']['name'];
                    $file_type = explode('.',$img);
                    $type = end($file_type);
                    if(in_array($type, $types)) {
                        $output = ['status'=>true, 'content'=>''];
                        $new_name = $slug.'.'.$type;
                        $img_tmp = $_FILES['up_anhbia']['tmp_name'];
                        $old_img = $this->truyen->getTruyenId($idtr)['anhbia'];
                        unlink($path.$old_img);
                        move_uploaded_file($img_tmp,$path.$new_name);
                        $this->truyen->update($idtr, $ten, $slug, $tacgia, $new_name, $tomtat);
                    } else {
                        $output = ['status'=>false, 'content'=>'File không đúng định dạng!'];
                    }
                } else {
                    $output = ['status'=>true, 'content'=>''];
                    $this->truyen->update($idtr, $ten, $slug, $tacgia,'', $tomtat);
                }
                // xu ly the loai
                $this->theloai->deleteTheloaiTruyen($idtr);
                $this->theloai->addTheloaiTruyen($idtl, $idtr);
                echo json_encode($output);
            }
        }

        public function changeStatus(){
            if($this->request->isPost()) {
                $idtr = $this->request->getFields()['idtr'];
                $stt = $this->request->getFields()['stt'];
                $this->truyen->changeStatus($idtr,$stt);
            }
        }

        public function loadChuong() {
            if($this->request->isPost()) {
                $id = $this->request->getFields()['id'];
                $data = $this->chuong->getListChuong($id);
                $output = '<button class="form-control btn rounded-pill btn-outline-success" id="addchuong" data-bs-toggle="modal" data-idtr="'.$id.'" data-bs-dismiss="modal" data-bs-target="#addchuongModal" ><i class="bi bi-plus-circle-fill"></i> Thêm chương</button>';
                if($data) {
                    foreach($data as $tr) {
                        $output .=  '<div class="form-group row mt-2">
                                        <div class="col-10">
                                            <div class="form-control btn rounded-pill btn-danger text-capitalize">'.$tr['tenchuong'].'</div>
                                        </div>
                                        <div class="col-2">
                                            <div class="btn-group">
                                                <button data-id="'.$tr['idchuong'].'" id="editchuong" data-bs-toggle="modal" data-bs-target="#editchuongModal" data-bs-dismiss="modal" class="btn btn-primary"><i class="bi bi-pencil-fill" data-bs-dismiss="modal" title="Sửa chương"></i></button>
                                            </div>
                                        </div>
                                    </div>';
                    }
                } else {
                    $output .= '<center><b><div class="text-danger mt-2">Truyện này chưa có chương nào!</div></b></center>';
                }
                echo json_encode($output);
            }
        }

        public function getChuong() {
            if($this->request->isPost()){
                $id = $this->request->getFields()['id'];
                $data = $this->chuong->getDetailChuong($id);
                echo json_encode($data);
            }
        }

        public function addChuong() {
            if($this->request->isPost()) {
                $idtr = $this->request->getFields()['idtr'];
                $ten = $this->request->getFields()['ten'];
                $slug = $this->request->getFields()['slug'];
                $hinhanh = $this->request->getFields()['hinhanh'];
                $date = date('Y-m-d H:i:s', time());
                $this->chuong->add($idtr, $ten, $slug, $hinhanh, $date);
                $this->truyen->updateTime($idtr, $date);
            }
            echo json_encode(1);
        }

        public function updateChuong() {
            if($this->request->isPost()){
                $id = $this->request->getFields()['id'];
                $ten = $this->request->getFields()['ten'];
                $slug = $this->request->getFields()['slug'];
                $hinhanh = $this->request->getFields()['hinhanh'];
                $this->chuong->update($id, $ten, $slug, $hinhanh);
            }
            echo json_encode(1);
        }

        public function checkAdmin() {
            if(session::checkSession('acc')){
                if(session::getSession('acc')['qtc'] == 0){
                    $this->response->redirect('trang-chu');
                }
            } else {
                $this->response->redirect('dang-nhap');
            }
        }

        public function page($page, $pages){
            if($pages > 1){
                $output = '<div class="pagination">';
                if($page > 1) {
                    $output .= '<li class="page-item"><a href="javascript:void(0);" data-page="'.($page-1).'" class="page-link"><i class="icon dripicons-chevron-left"></i></a></li>';
                }
                for($i=1; $i <= $pages; $i++) {
                    if($i > $page - 3 && $i < $page + 3) {
                        if($page==$i){
                            $output .= '<li class="page-item active"><a class="page-link" id="active" data-page="'.$i.'" href="javascript:void(0);">'.$i.'</a></li>';
                        } else {
                            $output .= '<li class="page-item"><a class="page-link" data-page="'.$i.'" href="javascript:void(0);">'.$i.'</a></li>';
                        }
                    }
                }
                if($page < $pages) {
                    $output .= '<li class="page-item"><a class="page-link" href="javascript:void(0);" data-page="'.($page+1).'"><i class="icon dripicons-chevron-right"></i></a></li>';
                }
                $output .= '</div>';
                return $output;
            }
        }
        
    }
?>