<?php 
    class ttinsach_m extends connectDB{
        function themttinsach_ins($ms,$ts,$tg,$nxb,$tl,$nn,$tt){
            $sql="INSERT INTO ttinsach 
            VALUES('$ms','$ts','$tg','$nxb','$tl','$nn','$tt')";
            return mysqli_query($this->con,$sql);
        }
        function checktrungmattinsach($ms){
            $sql="SELECT * FROM ttinsach WHERE masach='$ms'";
            $dl=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($dl)>0)
                $kq= true;
            return $kq;
        }
        function ttinsach_find($ms,$ts){
            $sql="SELECT * FROM ttinsach 
            WHERE masach like '%$ms%' AND 
            tensach like '%$ts%'";
            // --cách sắp xếp theo giá vé 
            // -- ORDER BY giave cho vào trước dấu "; ở dòng 19
            return mysqli_query($this->con,$sql);
        }
        function ttinsach_findupd($ms){
            $sql="SELECT * FROM ttinsach 
            WHERE masach = '$ms' ";
            // --cách sắp xếp theo giá vé 
            // -- ORDER BY giave cho vào trước dấu "; ở dòng 19
            return mysqli_query($this->con,$sql);
        }
        
        // function loaive_find1(){
        //     $sql = "SELECT tiencoc FROM dichvu";
        //     return mysqli_query($this->con, $sql);
        // }
        // hiển thị ô maloaive >2 sửa tương tự các điều kiện theo yêu cầu ở dòng 27
        // function loaive_find($mlv, $tlv) {
        //     $sql = "SELECT * FROM loaive 
        //             WHERE maloaive > '2' AND 
        //             maloaive LIKE '%$mlv%' AND 
        //             tenloaive LIKE '%$tlv%'";
        //     return mysqli_query($this->con, $sql);
        // }

        function ttinsach_del($ms){
            $sql="DELETE FROM ttinsach WHERE masach='$ms'";
            return mysqli_query($this->con,$sql);
        }
        function ttinsach_upd($ms,$ts,$tg,$nxb,$tl,$nn,$tt){
            $sql="UPDATE ttinsach SET tensach='$ts', tacgia='$tg', namxb = '$nxb', theloai = '$tl', ngaynhap = '$nn',tinhtrang = '$tt'
            WHERE masach='$ms'";
            return mysqli_query($this->con,$sql);
        }
    }
?>