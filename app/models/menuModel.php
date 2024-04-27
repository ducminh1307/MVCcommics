<?php
    class menuModel extends DB{
        public function getAll(){
            $sql = 'SELECT * FROM menu';
            $rs = mysqli_query($this->conn, $sql);
            while($row = mysqli_fetch_array($rs)){
                $data[] = $row;
            }
            return $data;
        }
        public function addMenu($name, $slug){
            $sql = "INSERT INTO menu(tenmenu, slugmenu) VALUES('$name', '$slug')";
            $rs = mysqli_query($this->conn, $sql);
        }
        public function getMenu($id) {
            $sql = "SELECT * FROM menu WHERE idmenu = $id";
            $rs = mysqli_query($this->conn, $sql);
            $data = mysqli_fetch_array($rs);
            return $data;
        }
        public function updateMenu($id, $name, $slug) {
            $sql = "UPDATE menu SET tenmenu = '$name', slugmenu = '$slug' WHERE idmenu = '$id'";
            $rs = mysqli_query($this->conn, $sql);
        }
        public function deleteMenu($id) {
            $sql = "DELETE FROM menu WHERE idmenu = $id";
            $rs = mysqli_query($this->conn, $sql);
        }
    }
?>