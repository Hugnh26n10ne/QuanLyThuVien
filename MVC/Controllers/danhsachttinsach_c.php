<?php 
class danhsachttinsach_c extends controller{
    private $dslv;
    function __construct()
    {
        $this->dslv=$this->model('ttinsach_m');
    }
    function Get_data(){
        $this->view('Masterlayout',[
            'page'=>'danhsachttinsach_v',
            'dulieu'=>$this->dslv->ttinsach_find('',''),
           // 'dulieu1'=>$this->dslv->loaive_find1()
        ]);
    }

    function timkiem(){
        if(isset($_POST['btnTimkiem'])){
            $ms=$_POST['txtmasach'];
            $ts=$_POST['txttensach'];
            $dl=$this->dslv->ttinsach_find($ms,$ts);
            //Gọi lại giao diện và truyền $dl ra
            $this->view('Masterlayout',[
                'page'=>'danhsachttinsach_v',
                'dulieu'=>$dl,
                'ms'=>$ms,
                'ts'=>$ts
            ]);
        }
    }
    function xoa($ms){
        $kq=$this->dslv->ttinsach_del($ms);
        if($kq){
            echo '<script>alert("Xóa thành công!")</script>';   
        }
        else{
            echo '<script>alert("Xóa thất bại!")</script>';   
        }
        //Gọi lại giao diện và truyền $dl ra
        $dl=$this->dslv->ttinsach_find('','');
        $this->view('Masterlayout',[
            'page'=>'danhsachttinsach_v',
            'dulieu'=>$dl
        ]);
    }
    function sua($ms){
        $this->view('Masterlayout',[
            'page'=>'suattinsach_v',
            'dulieu'=>$this->dslv->ttinsach_findupd($ms)
        ]);
    }
    function suadl(){
        if(isset($_POST['btnLuu'])){
            $ms=$_POST['txtmasach'];
            $ts=$_POST['txttensach'];
            $tg=$_POST['txttacgia'];
            $nxb=$_POST['txtnamxuatban'];
            $tl=$_POST['txttheloai'];
            $nn=$_POST['txtngaynhap'];
            $tt=$_POST['txttinhtrang'];
            //gọi hàm chèn dl loaive_ins trong tacgia của model
            // $kq=$this->dslv->loaive_upd($mlv,$tlv,$gv);
            // if($kq){
            //     echo '<script>alert("Sửa thành công!")</script>';    
            // }
            // else{
            //     echo '<script>alert("Sửa thất bại!")</script>';    
            // }
            
            if (empty($ms) || empty($ts)  || empty($tg) || empty($tt)) {
                echo '<script>alert("Vui lòng nhập đầy đủ thông tin!")</script>';
            }else{
                    //gọi hàm chèn dl loaive_ins trong loaive của model
                    $kq=$this->dslv->ttinsach_upd($ms,$ts,$tg,$nxb,$tl,$nn,$tt);
                    if($kq){
                        echo '<script>alert("sửa thành công!")</script>';    
                    }
                    else{
                        echo '<script>alert("sửa thất bại!")</script>';    
                    }
                }
            //Gọi lại giao diện
            $this->view('Masterlayout',[
                'page'=>'danhsachttinsach_v',
                'dulieu'=>$this->dslv->ttinsach_find('','')
            ]);
        }
    }
}
?>