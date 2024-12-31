<?php 
class phieumuon_m extends connectDB {
    function phieumuon_ins($mamuontra, $masach, $mauser, $ngaymuon, $ngayphaitra) {
        // Kiểm tra các dữ liệu không được để trống
        if (empty($mamuontra) || empty($masach) || empty($mauser) || empty($ngaymuon) || empty($ngayphaitra)) {
            return "Không được để trống dữ liệu trừ ngày trả";
        }
    
        // Thực hiện truy vấn
        $sql = "INSERT INTO muontrasach (mamuontra, masach, mauser, ngaymuon, ngayphaitra) 
                VALUES('$mamuontra', '$masach', '$mauser', '$ngaymuon', '$ngayphaitra')";
        return mysqli_query($this->con, $sql);
    }
    

    function checktrungmamuontra($mamuontra) {
        $sql = "SELECT * FROM muontrasach WHERE mamuontra='$mamuontra'";
        $dl = mysqli_query($this->con, $sql);
        $kq = false;
        if (mysqli_num_rows($dl) > 0) {
            $kq = true;
        }
        return $kq;
    }

    function phieumuon_find($mamuontra, $masach) {
        $sql = "SELECT * FROM muontrasach 
        WHERE mamuontra LIKE '%$mamuontra%' AND 
        masach LIKE '%$masach%'";
        return mysqli_query($this->con, $sql);
    }

    function phieumuon_findupd($mamuontra) {
        $sql = "SELECT * FROM muontrasach 
        WHERE mamuontra = '$mamuontra'";
        return mysqli_query($this->con, $sql);
    }

    function phieumuon_del($mamuontra) {
        $sql = "DELETE FROM muontrasach WHERE mamuontra='$mamuontra'";
        return mysqli_query($this->con, $sql);
    }

    function phieumuon_upd($mamuontra, $masach, $mauser, $ngaymuon, $ngayphaitra, $ngaytra) {
        // Thực hiện cập nhật thông tin phiếu mượn
        $sql = "UPDATE muontrasach SET masach='$masach', mauser='$mauser', ngaymuon='$ngaymuon', ngayphaitra='$ngayphaitra', ngaytra='$ngaytra'
                WHERE mamuontra='$mamuontra'";
        $result = mysqli_query($this->con, $sql);
    
        // Nếu ngaytra có giá trị, cập nhật tinhtrang trong bảng ttinsach thành 1
        if (!empty($ngaytra)) {
            $sql_update_tinhtrang = "UPDATE ttinsach SET tinhtrang = 1 WHERE masach = '$masach'";
            mysqli_query($this->con, $sql_update_tinhtrang);
        }
    
        return $result;
    }
    

    function checkTinhTrangSach($masach) {
        $sql = "SELECT tinhtrang FROM ttinsach WHERE masach='$masach'";
        $result = mysqli_query($this->con, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['tinhtrang'] == 0;
        }
        return false;
    }

    function updateTinhTrangSach($masach, $tinhtrang) {
        $sql = "UPDATE ttinsach SET tinhtrang='$tinhtrang' WHERE masach='$masach'";
        return mysqli_query($this->con, $sql);
    }
}
?>
