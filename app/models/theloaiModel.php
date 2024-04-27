<?php
    class theloaiModel extends DB {
        public function getAll(){
            $sql = "SELECT * FROM theloai ORDER BY tentheloai ASC";
            $rs = mysqli_query($this->conn, $sql);
            while($row = mysqli_fetch_array($rs)){
                $data[] = $row;
            }
            return $data;
        }
        public function getTypeAll($page, $limit){
            $start = ($page-1)*$limit;
            $sql = "SELECT * FROM theloai ORDER BY tentheloai ASC LIMIT $start,$limit";
            $rs = mysqli_query($this->conn, $sql);
            while($row = mysqli_fetch_array($rs)){
                $data[] = $row;
            }
            return $data;
        }
        public function totalPage($limit) {
            $sql = "SELECT * FROM theloai";
            $rs = mysqli_query($this->conn, $sql);
            $data = mysqli_num_rows($rs);
            $data = ceil($data/$limit);
            return $data;
        }
        public function getTheloai8(){
            $sql = 'SELECT * FROM theloai LIMIT 11';
            $rs = mysqli_query($this->conn, $sql);
            while($row = mysqli_fetch_array($rs)){
                $data[] = $row;
            }
            return $data;
        }
        public function getTheloai($id) {
            $sql = "SELECT dstheloai.idtheloai, theloai.tentheloai, theloai.slugtheloai FROM theloai INNER JOIN dstheloai ON dstheloai.idtheloai = theloai.idtheloai WHERE dstheloai.idtruyen = $id";
            $rs = mysqli_query($this->conn, $sql);
            while($row = mysqli_fetch_array($rs)){
                $data[] = $row;
            }
            return $data;
        }
        public function getTheloai1($id) {
            $sql = "SELECT * FROM theloai WHERE idtheloai = $id";
            $rs = mysqli_query($this->conn, $sql);
            $data = mysqli_fetch_array($rs);
            return $data;
        }
        public function add($name, $slug) {
            $sql = "INSERT INTO theloai(tentheloai,slugtheloai) VALUES('$name', '$slug')";
            $rs = mysqli_query($this->conn, $sql);
        }
        public function update($id, $name, $slug) {
            $sql = "UPDATE theloai SET tentheloai='$name', slugtheloai='$slug' WHERE idtheloai='$id'";
            $rs = mysqli_query($this->conn, $sql);
        }
        public function delete($id) {
            $sql = "DELETE FROM theloai WHERE idtheloai='$id'";
            $rs = mysqli_query($this->conn, $sql);
        }
        public function getnameType($slug) {
            $sql = "SELECT tentheloai FROM theloai WHERE slugtheloai = '$slug'";
            $rs = mysqli_query($this->conn, $sql);
            $data = mysqli_fetch_array($rs);
            return $data;
        }
        public function addTheloaiTruyen($idtl=[], $idtr) {
            $sql = 'INSERT INTO dstheloai(idtheloai,idtruyen) VALUES';
            $values = array();
            for($i=0; $i<count($idtl); $i++) {
                $values[] = "($idtl[$i],$idtr)";
            }
            $sql .= implode(',', $values);
            $rs = mysqli_query($this->conn, $sql);
            return $rs;
        }
        public function deleteTheloaiTruyen($idtr) {
            $sql = "DELETE FROM dstheloai WHERE idtruyen = $idtr";
            $rs = mysqli_query($this->conn, $sql);
            return $rs;
        }
    }
?>