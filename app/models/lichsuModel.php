<?php
    class lichsuModel extends DB{
        public function check($user, $idtr) {
            $sql = "SELECT * FROM lichsu WHERE tendangnhap = '$user' AND idtruyen = '$idtr' LIMIT 1";
            $rs = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($rs)>0) {
                $data = mysqli_fetch_array($rs);
            } else {
                $data = false;
            }
            return $data;
        }
        public function getLichsu($user){
            $sql = "SELECT truyen.idtruyen, truyen.tentruyen, truyen.slugtruyen, truyen.anhbia, chuong.slugchuong, chuong.tenchuong FROM lichsu INNER JOIN truyen ON lichsu.idtruyen = truyen.idtruyen INNER JOIN chuong ON lichsu.idchuong = chuong.idchuong WHERE lichsu.tendangnhap = '$user' ORDER BY lichsu.idlichsu DESC";
            $rs = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($rs)>0) {
                while($row = mysqli_fetch_array($rs)) {
                    $data[] = $row;
                }
            } else {
                $data = false;
            }
            return $data;
        }
        public function addLichsu($user, $idtr, $idch) {
            $sql = "INSERT INTO lichsu(tendangnhap, idtruyen, idchuong) VALUES ('$user', $idtr, $idch)";
            $rs = mysqli_query($this->conn, $sql);
        }
        public function updateLichsu($user, $idtr, $idch) {
            $sql = "UPDATE lichsu SET idchuong=$idch WHERE tendangnhap ='$user' AND idtruyen=$idtr";
            $rs = mysqli_query($this->conn, $sql);
        }
    }
?>