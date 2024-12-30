<?php 
class themsinhvien_c extends controller{
    private $themsinhvien_c;
    function __construct()
    {
        $this->sinhvien_m=$this->model('sinhvien_m');
    }
    function Get_data(){
        $this->view('Masterlayout',[
            'page'=>'themsinhvien_v'
        ]);
    }
    function themmoi(){
        if(isset($_POST['btnLuu'])){
            $mauser=$_POST['txtmauser'];
            $masinhvien=$_POST['txtmasinhvien'];
            $matkhau=$_POST['txtmatkhau'];
            $tensinhvien=$_POST['txttensinhvien'];
            $namsinh=$_POST['txtnamsinh'];
            $gioitinh=$_POST['ddlgioitinh'];
            $sodienthoai=$_POST['txtsodienthoai'];

            // if (!preg_match('/^lv/', $mlv)) {
            //     echo '<script>alert("Mã loại vé phải bắt đầu bằng \'lv...\'!")</script>';
            // }
            //else
            //Kiểm tra trùng mã loại vé
            $kq1=$this->sinhvien_m->checktrungmasinhvien($masinhvien);
            if($kq1){
                echo '<script>alert("Trùng mã sinh viên!")</script>';    
            }
            // if(!$this->nhanvien_m->kiemtramanoilamviec($mnlv)){
                // echo '<script>alert("Mã nơi làm việc không tồn tại!")</script>';
                // $this->view('Masterlayout',[
                    // 'page' => 'themnhanvien_v'
                // ]);
                // return;
            // }
            else{
                //gọi hàm chèn dl tacgia_ins trong tacgia của model
                $kq=$this->sinhvien_m->sinhvien_ins($mauser,$masinhvien,$matkhau,$tensinhvien,$namsinh,$gioitinh,$sodienthoai);
                if($kq){
                    echo '<script>alert("Thêm mới thành công!")</script>';    
                }
                else{
                    echo '<script>alert("Thêm mới thất bại!")</script>';    
                }
            }
            //Gọi lại giao diện
            $this->view('Masterlayout',[
                'page'=>'themsinhvien_v',
                'mauser'=>$mauser,
                'masinhvien'=>$masinhvien,
                'matkhau'=>$matkhau,
                'tensinhvien'=>$tensinhvien,
                'namsinh'=>$namsinh,
                'gioitinh'=>$gioitinh,
                'sodienthoai'=>$sodienthoai
                
            ]);
        }
    }
}
?>