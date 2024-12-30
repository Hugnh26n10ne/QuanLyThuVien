<?php 
    class phieumuon_m extends connectDB{
        function phieumuon_ins($mamuontra, $masach, $mauser, $ngaymuon, $ngayphaitra, $ngaytra){
            if (empty($mamuontra) || empty($masach) || empty($mauser) || empty($ngaymuon) || empty($ngayphaitra)){
                echo '<script>alert("Không được để trống dữ liệu !")</script>';
                return false;
            }
            $sql = "INSERT INTO muontrasach 
            VALUES('$mamuontra', '$masach', '$mauser', '$ngaymuon', '$ngayphaitra', '$ngaytra')";
            return mysqli_query($this->con, $sql);
        }

        function checktrungmamuontra($mamuontra){
            $sql = "SELECT * FROM muontrasach WHERE mamuontra='$mamuontra'";
            $dl = mysqli_query($this->con, $sql);
            $kq = false;
            if(mysqli_num_rows($dl) > 0)
                $kq = true;
            return $kq;
        }

        function phieumuon_find($mamuontra, $masach){
            $sql = "SELECT * FROM muontrasach 
            WHERE mamuontra LIKE '%$mamuontra%' AND 
            masach LIKE '%$masach%'";
            return mysqli_query($this->con, $sql);
        }

        function phieumuon_del($mamuontra){
            $sql = "DELETE FROM muontrasach WHERE mamuontra='$mamuontra'";
            return mysqli_query($this->con, $sql);
        }

        function phieumuon_upd($mamuontra, $masach, $mauser, $ngaymuon, $ngayphaitra, $ngaytra){
            $sql = "UPDATE muontrasach SET masach='$masach', mauser='$mauser', ngaymuon='$ngaymuon', ngayphaitra='$ngayphaitra', ngaytra='$ngaytra'
            WHERE mamuontra='$mamuontra'";
            return mysqli_query($this->con, $sql);
        }

        function phieumuon_findupd($mamuontra){
            $sql = "SELECT * FROM muontrasach 
            WHERE mamuontra = '$mamuontra'";
            return mysqli_query($this->con, $sql);
        }
    }
?>
