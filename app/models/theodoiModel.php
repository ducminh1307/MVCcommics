<?php
    class theodoiModel extends DB {
        public function checkFollow($user, $id){
            $sql = "SELECT * FROM theodoi WHERE tendangnhap ='$user' AND idtruyen = $id";
            $rs = mysqli_query($this->conn, $sql);
            if($rs) {
                if(mysqli_num_rows($rs)>0){
                    return true;
                } else {
                    return false;
                }
            }
        }
        public function addFollow($user, $id) {
            $sql = "INSERT INTO theodoi(idtruyen, tendangnhap) VALUES ($id,'$user')";
            $rs = mysqli_query($this->conn, $sql);
            return $rs;
        }
        public function deleteFollow($user, $id) {
            $sql = "DELETE FROM theodoi WHERE tendangnhap = '$user' AND idtruyen = $id";
            $rs = mysqli_query($this->conn, $sql);
            return $rs;
        }
        public function getFollow($user) {
            $sql = "SELECT truyen.idtruyen, truyen.tentruyen, truyen.slugtruyen, truyen.anhbia, chuong.idchuong, chuong.tenchuong, chuong.slugchuong, theodoi.idtheodoi\n"
                    . "FROM truyen INNER JOIN chuong ON truyen.idtruyen = chuong.idtruyen\n"
                    . "INNER JOIN theodoi ON truyen.idtruyen = theodoi.idtruyen\n"
                    . "WHERE theodoi.tendangnhap = '$user' AND truyen.ngaycapnhat = chuong.ngaydang;";
            $rs = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($rs) > 0){
                while($row = mysqli_fetch_array($rs)){
                    $data[] = $row;
                }
                return $data;
            } else {
                return false;
            }
        }
        public function removeFollow($id) {
            $sql = "DELETE FROM theodoi WHERE idtheodoi = $id";
            $rs = mysqli_query($this->conn, $sql);
            return $rs;
        }
        public function thongke(){
            $sql = "SELECT COUNT(idtheodoi) as theodoi FROM theodoi LIMIT 1";
            $rs = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($rs) > 0){
                $data = mysqli_fetch_array($rs);
                return $data;
            } else {
                return false;
            }
        }
    }
?>