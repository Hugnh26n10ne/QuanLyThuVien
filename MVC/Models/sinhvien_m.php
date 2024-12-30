<?php 
    class sinhvien_m extends connectDB{
        function sinhvien_ins($mauser,$masinhvien,$matkhau,$tensinhvien,$namsinh,$gioitinh,$sodienthoai){
            if (empty($mauser)||empty($masinhvien)||empty($matkhau)||empty($tensinhvien)||empty($namsinh) || empty($gioitinh) ||empty($sodienthoai) ){
                echo '<script>alert("Không được để trống dữ liệu !")</script>';
                return false;
            }
            $sql="INSERT INTO sinhvien 
            VALUES('$mauser','$masinhvien','$matkhau','$tensinhvien','$namsinh','$gioitinh','$sodienthoai')";
            return mysqli_query($this->con,$sql);
        }
        function checktrungmasinhvien($masinhvien){
            $sql="SELECT * FROM sinhvien WHERE masinhvien='$masinhvien'";
            $dl=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($dl)>0)
                $kq= true;
            return $kq;
        }
        function sinhvien_find($masinhvien,$tensinhvien){
            $sql="SELECT * FROM sinhvien 
            WHERE masinhvien like '%$masinhvien%' AND 
            tensinhvien like '%$tensinhvien%'";
            return mysqli_query($this->con,$sql);
        }
        function sinhvien_del($mauser){
            $sql="DELETE FROM sinhvien WHERE mauser='$mauser'";
            return mysqli_query($this->con,$sql);
        }
        function sinhvien_upd($mauser,$masinhvien,$matkhau,$tensinhvien,$namsinh,$gioitinh,$sodienthoai){
            $sql="UPDATE sinhvien SET masinhvien='$masinhvien', matkhau='$matkhau', tensinhvien='$tensinhvien', namsinh='$namsinh', gioitinh='$gioitinh',sodienthoai='$sodienthoai'
            WHERE mauser='$mauser'";
            return mysqli_query($this->con,$sql);
        }
        function sinhvien_findupd($mauser){
            $sql="SELECT * FROM sinhvien 
            WHERE mauser = '$mauser' ";
            return mysqli_query($this->con,$sql);
        }
    }
?>