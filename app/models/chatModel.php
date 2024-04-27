<?php
    class chatModel extends DB {
        public function addChat($user, $mess){
            $sql = "INSERT INTO chat(tendangnhap, chatnoidung) VALUES ('$user', '$mess')";
            $rs = mysqli_query($this->conn, $sql);
            return $rs;
        }
        public function loadAll(){
            $sql = "SELECT taikhoan.tenhienthi, taikhoan.anhhienthi, chat.chatnoidung, chat.ngaydang FROM chat INNER JOIN taikhoan WHERE chat.tendangnhap = taikhoan.tendangnhap ORDER BY chat.ngaydang ASC";
            $rs = mysqli_query($this->conn, $sql);
            if($rs) {
                if(mysqli_num_rows($rs) > 0) {
                    while($row = mysqli_fetch_array($rs)){
                        $data[] = $row;
                    }
                    return $data;
                } else {
                    return false;
                }
            }
            return false;
        }
    }
?>