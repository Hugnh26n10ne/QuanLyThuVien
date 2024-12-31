<?php 
class themttinsach_c extends controller{
    private $themttinsach_c;
    function __construct()
    {
        $this->ttinsach_m=$this->model('ttinsach_m');
    }
    function Get_data(){
        $this->view('Masterlayout',[
            'page'=>'themttinsach_v'
        ]);
    }
    function themmoi(){
        if(isset($_POST['btnLuu'])){
            $ms=$_POST['txtmasach'];
            $ts=$_POST['txttensach'];
            $tg=$_POST['txttacgia'];
            $nxb=$_POST['txtnamxuatban'];
            $tl=$_POST['txttheloai'];
            $nn=$_POST['txtngaynhap'];
            $tt=$_POST['txttinhtrang'];
            // if (!preg_match('/^lv/', $mlv)) {
            //     echo '<script>alert("Mã loại vé phải bắt đầu bằng \'lv...\'!")</script>';
            // }
            //else
             if (empty($ms) || empty($ts) || empty($tg) || empty($tt)) {
                echo '<script>alert("Vui lòng nhập đầy đủ thông tin cơ bản !")</script>';
            }else{
                //Kiểm tra trùng mã sach
                $kq1=$this->ttinsach_m->checktrungmattinsach($ms);
                if($kq1){
                    echo '<script>alert("Trùng mã sach!")</script>';    
                }
                else{
                    //gọi hàm chèn dl themloaive_ins trong ttinsach_m của model
                    $kq=$this->ttinsach_m->ttinsach_ins($ms,$ts,$tg,$nxb,$tl,$nn,$tt);
                    if($kq){
                        echo '<script>alert("Thêm mới thành công!")</script>';    
                    }
                    else{
                        echo '<script>alert("Thêm mới thất bại!")</script>';    
                    }
                }
            }
            //Gọi lại giao diện
            $this->view('Masterlayout',[
                'page'=>'themttinsach_v',
                'masach'=>$ms,
                'tensach'=>$ts,
                'tacgia'=>$tg,
                'namxuatban'=>$nxb,
                'theloai'=>$tl,
                'ngaynhap'=>$nn,
                'tinhtrang'=>$tt
            ]);
        }
    }
}
?>
