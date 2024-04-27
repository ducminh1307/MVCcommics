<?php
     class truyenModel extends DB {
        public function getTruyenHome($slug){
            $sql = "SELECT truyen.idtruyen, chuong.tenchuong, truyen.tentruyen, truyen.anhbia, truyen.slugtruyen, truyen.tomtat, chuong.idchuong, chuong.slugchuong, chuong.ngaydang
            FROM truyen INNER JOIN chuong ON truyen.idtruyen=chuong.idtruyen INNER JOIN dstheloai ON truyen.idtruyen = dstheloai.idtruyen WHERE truyen.ngaycapnhat = chuong.ngaydang AND dstheloai.idtheloai = (SELECT idtheloai FROM theloai WHERE slugtheloai='$slug') ORDER BY truyen.ngaycapnhat DESC LIMIT 6";
            $rs = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($rs)>0) {
                while($row = mysqli_fetch_array($rs)){
                    $data[] = $row;
                }
            } else {
                $data = false;
            }
            return $data;
        }
        public function getTruyenhot(){
            $sql = "SELECT truyen.idtruyen, truyen.tentruyen, truyen.slugtruyen, truyen.anhbia, truyen.ngaydang, SUM(chuong.luotxem) AS 'luotxem' FROM truyen INNER JOIN chuong ON truyen.idtruyen = chuong.idtruyen GROUP BY chuong.idtruyen ORDER BY luotxem DESC LIMIT 5";
            $rs = mysqli_query($this->conn, $sql);
            while($row = mysqli_fetch_array($rs)){
                $data[] = $row;
            }
            return $data;
        }
        public function truyenMoi($page, $limit){
            $start = ($page-1) * $limit;
            $sql = "SELECT truyen.idtruyen, truyen.tentruyen, truyen.anhbia, truyen.slugtruyen, chuong.slugchuong, chuong.tenchuong FROM truyen INNER JOIN chuong ON truyen.idtruyen = chuong.idtruyen WHERE truyen.ngaycapnhat=chuong.ngaydang ORDER BY ngaycapnhat DESC LIMIT $start, $limit";
            $rs = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($rs)>0) {
                while($row = mysqli_fetch_array($rs)){
                    $data[] = $row;
                }
            } else {
                $data = false;
            }
            return $data;
        }
        public function truyenFull($page, $limit){
            $start = ($page-1) * $limit;
            $sql = "SELECT truyen.idtruyen, truyen.tentruyen, truyen.anhbia, truyen.slugtruyen, chuong.slugchuong, chuong.tenchuong FROM truyen INNER JOIN chuong ON truyen.idtruyen = chuong.idtruyen WHERE truyen.ngaycapnhat=chuong.ngaydang AND truyen.trangthai=1 ORDER BY ngaycapnhat DESC LIMIT $start, $limit";
            $rs = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($rs)>0) {
                while($row = mysqli_fetch_array($rs)){
                    $data[] = $row;
                }
            } else {
                $data = false;
            }
            return $data;
        }
        public function truyenHot($page, $limit){
            $start = ($page-1) * $limit;
            $sql = "SELECT truyen.idtruyen, truyen.tentruyen, truyen.slugtruyen, truyen.anhbia, SUM(chuong.luotxem) AS 'luotxem' FROM truyen INNER JOIN chuong ON truyen.idtruyen = chuong.idtruyen GROUP BY chuong.idtruyen ORDER BY luotxem DESC LIMIT $start, $limit";
            $rs = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($rs)>0) {
                while($row = mysqli_fetch_array($rs)){
                    $data[] = $row;
                }
            } else {
                $data = false;
            }
            return $data;
        }
        public function getTruyen($slug, $id){
            $sql = "SELECT truyen.idtruyen, truyen.tentruyen, truyen.slugtruyen, truyen.anhbia, truyen.tacgia, truyen.trangthai, truyen.tomtat, SUM(chuong.luotxem) AS 'luotxem' FROM truyen INNER JOIN chuong ON truyen.idtruyen = chuong.idtruyen WHERE truyen.slugtruyen = '$slug' AND truyen.idtruyen =$id LIMIT 1";
            $rs = mysqli_query($this->conn, $sql);
            $data = mysqli_fetch_array($rs);
            if(!empty($data['idtruyen'])){
                return $data;
            } else {
                return false;
            }
        }
        public function getTruyenId($id){
            $sql = "SELECT * FROM truyen WHERE idtruyen =$id LIMIT 1";
            $rs = mysqli_query($this->conn, $sql);
            $data = mysqli_fetch_array($rs);
            if(!empty($data['idtruyen'])){
                return $data;
            } else {
                return false;
            }
        }
        public function searchTruyen($ten) {
            $sql = "SELECT * FROM truyen WHERE tentruyen LIKE '%$ten%' OR tacgia LIKE '%$ten%' ORDER BY truyen.ngaycapnhat DESC";
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
        public function totalPage($name, $limit){
            $sql = "SELECT * FROM truyen WHERE tentruyen LIKE '%$name%' OR tacgia LIKE '%$name%'";
            $rs = mysqli_query($this->conn, $sql);
            $data = mysqli_num_rows($rs);
            $data = ceil($data/$limit);
            return $data;
        }
        public function totalPageType($slug, $limit){
            $sql = "SELECT * FROM truyen INNER JOIN dstheloai on truyen.idtruyen = dstheloai.idtruyen WHERE dstheloai.idtheloai =(SELECT idtheloai FROM theloai WHERE theloai.slugtheloai = '$slug')";
            $rs = mysqli_query($this->conn, $sql);
            $data = mysqli_num_rows($rs);
            $data = ceil($data/$limit);
            return $data;
        }
        public function totalPageTruyenmoi($limit) {
            $sql = "SELECT truyen.idtruyen, chuong.tenchuong, truyen.tentruyen, truyen.anhbia, truyen.slugtruyen, chuong.idchuong, chuong.slugchuong FROM truyen INNER JOIN chuong ON truyen.idtruyen=chuong.idtruyen WHERE truyen.ngaycapnhat = chuong.ngaydang";
            $rs = mysqli_query($this->conn, $sql);
            $data = mysqli_num_rows($rs);
            $data = ceil($data/$limit);
            return $data;
        }
        public function totalPageTruyenhot($limit) {
            $sql = "SELECT truyen.idtruyen, truyen.tentruyen, truyen.slugtruyen, truyen.anhbia, SUM(chuong.luotxem) AS 'luotxem' FROM truyen INNER JOIN chuong ON truyen.idtruyen = chuong.idtruyen GROUP BY chuong.idtruyen";
            $rs = mysqli_query($this->conn, $sql);
            $data = mysqli_num_rows($rs);
            $data = ceil($data/$limit);
            return $data;
        }
        public function totalPageTruyenfull($limit) {
            $sql = "SELECT truyen.idtruyen, truyen.tentruyen, truyen.anhbia, truyen.slugtruyen, chuong.slugchuong, chuong.tenchuong FROM truyen INNER JOIN chuong ON truyen.idtruyen = chuong.idtruyen WHERE truyen.ngaycapnhat=chuong.ngaydang AND truyen.trangthai=1";
            $rs = mysqli_query($this->conn, $sql);
            $data = mysqli_num_rows($rs);
            $data = ceil($data/$limit);
            return $data;
        }
        public function pagingSearchTruyen($name, $page, $limit) {
            $start = ($page-1) * $limit;
            $sql = "SELECT truyen.idtruyen, chuong.tenchuong, truyen.tentruyen, truyen.anhbia, truyen.slugtruyen, chuong.idchuong, chuong.slugchuong FROM truyen INNER JOIN chuong ON truyen.idtruyen=chuong.idtruyen WHERE (truyen.tentruyen LIKE '%$name%' OR truyen.tacgia LIKE '%$name%') AND truyen.ngaycapnhat = chuong.ngaydang ORDER BY truyen.ngaycapnhat DESC LIMIT $start, $limit";
            $rs = mysqli_query($this->conn, $sql);
            while ($row = mysqli_fetch_array($rs)){
                $data[] = $row;
            }
            if(!empty($data[0]['idtruyen'])) {
                return $data;
            }
            return false;
        }
        public function pagingTypeTruyen($slug, $page, $limit){
            $start = ($page-1) * $limit;
            $sql = "SELECT truyen.idtruyen, chuong.tenchuong, truyen.tentruyen, truyen.anhbia, truyen.slugtruyen, chuong.idchuong, chuong.slugchuong FROM truyen INNER JOIN chuong ON truyen.idtruyen=chuong.idtruyen INNER JOIN dstheloai ON truyen.idtruyen = dstheloai.idtruyen WHERE dstheloai.idtheloai =(SELECT idtheloai FROM theloai WHERE theloai.slugtheloai = '$slug') AND truyen.ngaycapnhat = chuong.ngaydang ORDER BY truyen.ngaycapnhat DESC LIMIT $start, $limit";
            $rs = mysqli_query($this->conn, $sql);
            while ($row = mysqli_fetch_array($rs)){
                $data[] = $row;
            }
            if(!empty($data[0]['idtruyen'])) {
                return $data;
            }
            return false;
        }
        public function thongke(){
            $sql = "SELECT COUNT(idtruyen) as truyen FROM truyen LIMIT 1";
            $rs = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($rs) > 0){
                $data = mysqli_fetch_array($rs);
                return $data;
            } else {
                return false;
            }
        }
        public function totalPageAll($limit){
            $sql = "SELECT * FROM truyen";
            $rs = mysqli_query($this->conn, $sql);
            $data = mysqli_num_rows($rs);
            $data = ceil($data/$limit);
            return $data;
        }
        public function getAll($page, $limit){
            $start = ($page-1) * $limit;
            $sql = "SELECT * FROM truyen LIMIT $start, $limit";
            $rs = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($rs)>0) {
                while($row = mysqli_fetch_array($rs)) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
        }
        public function getTruyenAdd($slug){
            $sql = "SELECT idtruyen FROM truyen WHERE slugtruyen = '$slug' LIMIT 1";
            $rs = mysqli_query($this->conn, $sql);
            $data = mysqli_fetch_array($rs);
            if(!empty($data['idtruyen'])){
                return $data;
            } else {
                return false;
            }
        }
        public function addTruyen($ten, $slug, $tacgia, $anhbia, $tomtat){
            $sql = "INSERT INTO truyen(tentruyen, slugtruyen, tacgia,  anhbia, tomtat) VALUES ('$ten','$slug','$tacgia','$anhbia','$tomtat')";
            $rs = mysqli_query($this->conn, $sql);
            return $rs;
        }
        public function delete($id){
            $sql = "DELETE FROM truyen WHERE idtruyen = $id";
            $rs = mysqli_query($this->conn, $sql);
            return $rs;
        }
        public function changeStatus($id, $stt) {
            $sql = "UPDATE truyen SET trangthai = $stt WHERE idtruyen = $id";
            $rs = mysqli_query($this->conn, $sql);
            return $rs;
        }
        public function update($idtr, $ten, $slug, $tacgia, $anhbia='', $tomtat){
            if(empty($anhbia)){
                $sql = "UPDATE truyen SET tentruyen='$ten',slugtruyen='$slug',tacgia='$tacgia',tomtat='$tomtat' WHERE idtruyen='$idtr'";
            } else {
                $sql = "UPDATE truyen SET tentruyen='$ten',slugtruyen='$slug',tacgia='$tacgia',anhbia='$anhbia',tomtat='$tomtat' WHERE idtruyen='$idtr'";
            }
            $rs = mysqli_query($this->conn, $sql);
            return $rs;
        }
        public function updateTime($idtr, $date){
            $sql = "UPDATE truyen SET ngaycapnhat = '$date' WHERE idtruyen = $idtr";
            $rs = mysqli_query($this->conn, $sql);
            return $rs;
        }
     }
?>