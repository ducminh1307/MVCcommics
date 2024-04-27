<?php
    class binhluanModel extends DB {
        public function getAll() {
            $sql = "SELECT truyen.tentruyen, truyen.slugtruyen, chuong.idtruyen, binhluan.idchuong, binhluan.tendangnhap, taikhoan.qtc, binhluan.noidung, binhluan.ngaydang FROM chuong \n"
            . "INNER JOIN binhluan ON chuong.idchuong = binhluan.idchuong \n"
            . "INNER JOIN truyen ON chuong.idtruyen = truyen.idtruyen \n"
            . "INNER JOIN taikhoan ON binhluan.tendangnhap = taikhoan.tendangnhap ORDER BY binhluan.ngaydang DESC LIMIT 20\n";
            $rs = mysqli_query($this->conn, $sql);
            while($row = mysqli_fetch_array($rs)){
                $data[] = $row;
            }
            return $data;
        }
        public function getBinhluan($id) {
            $sql = "SELECT taikhoan.tenhienthi, taikhoan.anhhienthi, taikhoan.qtc, binhluan.noidung, chuong.tenchuong, chuong.slugchuong, chuong.idchuong, binhluan.noidung, binhluan.ngaydang FROM binhluan\n"
            . "INNER JOIN taikhoan ON binhluan.tendangnhap = taikhoan.tendangnhap\n"
            . "INNER JOIN chuong ON binhluan.idchuong = chuong.idchuong\n"
            . "WHERE chuong.idtruyen = $id ORDER BY binhluan.idbinhluan DESC";
            $rs = mysqli_query($this->conn, $sql);
            $data = array();
            if(mysqli_num_rows($rs) > 0){
                while($row = mysqli_fetch_array($rs)){
                    $data[] = $row;
                }
            }
            return $data;
        }
        public function addBinhluan($idchuong, $user, $content) {
            $sql = "INSERT INTO binhluan(idchuong, tendangnhap, noidung) VALUES($idchuong, '$user', '$content')";
            $rs = mysqli_query($this->conn, $sql);
        }
        public function loadBinhluan($idch, $page, $limit) {
            $start = ($page-1)*$limit;
            $sql = "SELECT taikhoan.tenhienthi, taikhoan.anhhienthi, taikhoan.qtc, binhluan.noidung, binhluan.noidung, binhluan.ngaydang FROM binhluan\n"
            . "INNER JOIN taikhoan ON binhluan.tendangnhap = taikhoan.tendangnhap\n"
            . "INNER JOIN chuong ON binhluan.idchuong = chuong.idchuong\n"
            . "WHERE chuong.idchuong = $idch ORDER BY binhluan.ngaydang DESC LIMIT $start,$limit";
            $rs = mysqli_query($this->conn, $sql);
            $data = array();
            if(mysqli_num_rows($rs) > 0){
                while($row = mysqli_fetch_array($rs)){
                    $data[] = $row;
                }
            }
            return $data;
        }
        public function totalPage($idchuong, $limit) {
            $sql = "SELECT * FROM binhluan WHERE idchuong=$idchuong";
            $rs = mysqli_query($this->conn, $sql);
            $data = mysqli_num_rows($rs);
            $data = ceil($data/$limit);
            return $data;
        }
        public function totalPageAll($limit) {
            $sql = "SELECT * FROM binhluan";
            $rs = mysqli_query($this->conn, $sql);
            $data = mysqli_num_rows($rs);
            $data = ceil($data/$limit);
            return $data;
        }
        public function loadBinhluanAll($page, $limit) {
            $start = ($page-1)*$limit;
            $sql = "SELECT taikhoan.tenhienthi, taikhoan.tendangnhap, binhluan.idbinhluan, binhluan.noidung, binhluan.ngaydang FROM binhluan\n"
            . "INNER JOIN taikhoan ON binhluan.tendangnhap = taikhoan.tendangnhap\n"
            . "ORDER BY binhluan.ngaydang DESC LIMIT $start,$limit";
            $rs = mysqli_query($this->conn, $sql);
            $data = array();
            if(mysqli_num_rows($rs) > 0){
                while($row = mysqli_fetch_array($rs)){
                    $data[] = $row;
                }
            }
            return $data;
        }
        public function deleteBinhluan($id) {
            $sql = "DELETE FROM binhluan WHERE idbinhluan = $id";
            $rs = mysqli_query($this->conn, $sql);
            return $rs;
        }
    }
?>