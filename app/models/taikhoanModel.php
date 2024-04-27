<?php
    class taikhoanModel extends DB{
        
        public function getAll($page, $limit) {
            $start = ($page - 1) * $limit;
            $sql = "SELECT * FROM taikhoan ORDER BY tendangnhap ASC LIMIT $start,$limit";
            $rs = mysqli_query($this->conn, $sql);
            while($row = mysqli_fetch_array($rs)){
                $data[] = $row;
            }
            return $data;
        }
        public function checkUser($user) {
            $sql = "SELECT * FROM taikhoan WHERE tendangnhap = '$user'";
            $rs = mysqli_query($this->conn, $sql);
            $data = mysqli_fetch_array($rs);
            if(!empty($data)) {
                return $data;
            }
            return false;
        }
        public function getUser($user, $password) {
            $sql = "SELECT * FROM taikhoan WHERE tendangnhap = '$user' AND matkhau = '$password'";
            $rs = mysqli_query($this->conn, $sql);
            $data = mysqli_fetch_array($rs);
            return $data;
        }
        public function checkTendangnhap($user) {
            $sql = "SELECT * FROM taikhoan WHERE tendangnhap = '$user'";
            $rs = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($rs)>0) {
                return false;
            }
            return true;
        }
        public function checkTenhienthi($name) {
            $sql = "SELECT * FROM taikhoan WHERE tenhienthi = '$name'";
            $rs = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($rs)>0) {
                return false;
            }
            return true;
        }
        public function checkEmail($email) {
            $sql = "SELECT * FROM taikhoan WHERE email = '$email'";
            $rs = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($rs)>0) {
                return false;
            }
            return true;
        }
        public function addTaikhoan($user, $pass, $name, $logo, $email) {
            $OTP = rand(111111, 999999);
            $sql = "INSERT INTO taikhoan (tendangnhap, matkhau, tenhienthi, anhhienthi, email, maxacthuc) VALUES ('$user','$pass','$name','$logo','$email', $OTP)";
            $rs = mysqli_query($this->conn, $sql);
            return $rs;
        }
        public function changeAcc($user, $name, $img, $email){
            $sql = "UPDATE taikhoan SET tenhienthi='$name', anhhienthi='$img', email='$email' WHERE tendangnhap='$user'";
            $rs = mysqli_query($this->conn, $sql);
            return $rs;
        }
        public function setOTP($user){
            $OTP = rand(111111, 999999);
            $sql = "UPDATE taikhoan SET maxacthuc = $OTP WHERE tendangnhap='$user'";
            $rs = mysqli_query($this->conn, $sql);
            return $rs;
        }
        public function changePass($user, $pass){
            $sql = "UPDATE taikhoan SET matkhau = '$pass' WHERE tendangnhap='$user'";
            $rs = mysqli_query($this->conn, $sql);
            return $rs;
        }
        function getOTPEmail($email) {
            $sql = "SELECT maxacthuc FROM taikhoan where email= '$email' LIMIT 1";
            $rs = mysqli_query($this->conn, $sql);
            $data = mysqli_fetch_array($rs);
            return $data;
        }
        public function setOTPEmail($email){
            $OTP = rand(111111, 999999);
            $sql = "UPDATE taikhoan SET maxacthuc = $OTP WHERE email='$email'";
            $rs = mysqli_query($this->conn, $sql);
            return $rs;
        }
        public function changePassEmail($email, $password){
            $sql = "UPDATE taikhoan SET matkhau = '$password' WHERE email = '$email'";
            $rs = mysqli_query($this->conn, $sql);
            return $rs;
        }
        public function thongke(){
            $sql = "SELECT COUNT(tendangnhap) as taikhoan FROM taikhoan LIMIT 1";
            $rs = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($rs) > 0){
                $data = mysqli_fetch_array($rs);
                return $data;
            } else {
                return false;
            }
        }
        public function totalPage($limit){
            $sql = "SELECT * FROM taikhoan";
            $rs = mysqli_query($this->conn, $sql);
            $data = mysqli_num_rows($rs);
            $data = ceil($data/$limit);
            return $data;
        }
        public function changeQTC($user, $qtc){
            $sql = "UPDATE taikhoan SET qtc = '$qtc' WHERE tendangnhap = '$user'";
            $rs = mysqli_query($this->conn, $sql);
            return $rs;
        }
        public function deleteAcc($user){
            $sql = "DELETE FROM taikhoan WHERE tendangnhap = '$user'";
            $rs = mysqli_query($this->conn, $sql);
            return $rs;
        }
        
    }
?>