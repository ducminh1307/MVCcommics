<?php
    class chuongModel extends DB {
        public function getChuong($id) {
            $sql = "SELECT * FROM chuong WHERE idtruyen = $id ORDER BY idchuong DESC";
            $rs = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($rs)>0){
                while ($row = mysqli_fetch_array($rs)) {
                    $data[] = $row;
                }
                return $data;
            }            
            return false;
        }
        public function getXChuong($slugtr, $slugch){
            $sql = "SELECT truyen.idtruyen, truyen.tentruyen, truyen.slugtruyen, truyen.tomtat, chuong.idchuong, chuong.tenchuong, chuong.tenchuong, chuong.hinhanh, truyen.ngaycapnhat FROM chuong\n"
            . "INNER JOIN truyen ON chuong.idtruyen = truyen.idtruyen WHERE truyen.slugtruyen = '$slugtr' AND chuong.slugchuong = '$slugch'";
            $rs = mysqli_query($this->conn, $sql);
            $data = mysqli_fetch_array($rs);
            return $data;
        }
        public function getFirstChuong($id) {
            $sql = "SELECT * FROM chuong WHERE idtruyen = $id ORDER BY idtruyen ASC LIMIT 1";
            $rs = mysqli_query($this->conn, $sql);
            $data = mysqli_fetch_array($rs);
            return $data;
        }
        public function getChuongmoi(){
            $sql = "SELECT truyen.idtruyen, chuong.tenchuong, truyen.tentruyen, truyen.anhbia, truyen.slugtruyen, truyen.tomtat, chuong.idchuong, chuong.slugchuong, chuong.ngaydang FROM truyen INNER JOIN chuong ON truyen.idtruyen=chuong.idtruyen WHERE truyen.ngaycapnhat = chuong.ngaydang ORDER BY truyen.ngaycapnhat DESC LIMIT 6";
            $rs = mysqli_query($this->conn, $sql);
            while($row = mysqli_fetch_array($rs)){
                $data[] = $row;
            }
            return $data;
        }
        public function getAll($slugtr){
            $sql = "SELECT truyen.slugtruyen, chuong.tenchuong, chuong.slugchuong FROM chuong INNER JOIN truyen ON chuong.idtruyen = truyen.idtruyen WHERE truyen.slugtruyen = '$slugtr'";
            $rs = mysqli_query($this->conn, $sql);
            while($row = mysqli_fetch_array($rs)){
                $data[] = $row;
            }
            return $data;
        }
        public function viewChuong($idchuong) {
            $sql = "UPDATE chuong SET luotxem = luotxem + 1 WHERE idchuong = $idchuong";
            $rs = mysqli_query($this->conn, $sql);
        }
        public function thongke(){
            $sql = "SELECT SUM(luotxem) as luotxem FROM chuong LIMIT 1";
            $rs = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($rs) > 0){
                $data = mysqli_fetch_array($rs);
                return $data;
            } else {
                return false;
            }
        }
        public function getListChuong($id) {
            $sql = "SELECT * FROM chuong WHERE idtruyen = $id ORDER BY idchuong ASC";
            $rs = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($rs)>0){
                while ($row = mysqli_fetch_array($rs)) {
                    $data[] = $row;
                }
                return $data;
            }            
            return false;
        }
        public function getDetailChuong($id) {
            $sql = "SELECT * FROM chuong WHERE idchuong = $id LIMIT 1";
            $rs = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($rs)>0){
                $data = mysqli_fetch_array($rs);
                return $data;
            }            
            return false;
        }
        public function add($idtr, $ten, $slug, $hinhanh, $date) {
            $sql = "INSERT INTO chuong( idtruyen, tenchuong, slugchuong, hinhanh,  ngaydang) VALUES ($idtr,'$ten','$slug','$hinhanh','$date')";
            $rs = mysqli_query($this->conn, $sql);
            return $rs;
        }
        public function update($id, $ten, $slug, $hinhanh) {
            $sql = "UPDATE chuong SET tenchuong = '$ten', slugchuong = '$slug', hinhanh = '$hinhanh' WHERE idchuong = '$id'";
            $rs = mysqli_query($this->conn, $sql);
            return $rs;
        }
    }
?>