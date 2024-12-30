<?php
class dscttc_c extends controller {
    private $themcttc_m;

    function __construct() {
        $this->themcttc_m = $this->model('themcttc_m');
    }

    function Get_data() {
        $this->view('Masterlayout', [
            'page' => 'dscttc_v',
            'dulieu' => $this->themcttc_m->chitiettrochoi_find('')
        ]);
    }

    function timkiem() {
        if(isset($_POST['btnTimkiem'])) {
            $machitiettrochoi = $_POST['txtmachitiettrochoi'];
            $dl = $this->themcttc_m->chitiettrochoi_find($machitiettrochoi);
            $this->view('Masterlayout', [
                'page' => 'dscttc_v',
                'dulieu' => $dl,
                'machitiettrochoi' => $machitiettrochoi
            ]);
        }
    }

    function xoa($machitiettrochoi) {
        $kq = $this->themcttc_m->chitiettrochoi_del($machitiettrochoi);
        if($kq) {
            echo '<script>alert("Xóa thành công!")</script>';   
        } else {
            echo '<script>alert("Xóa thất bại!")</script>';   
        }
        $dl = $this->themcttc_m->chitiettrochoi_find('');
        $this->view('Masterlayout', [
            'page' => 'dscttc_v',
            'dulieu' => $dl
        ]);
    }

    function sua($machitiettrochoi) {
        $this->view('Masterlayout', [
            'page' => 'dscttc_sua_v',
            'dulieu' => $this->themcttc_m->chitiettrochoi_find($machitiettrochoi)
        ]);
    }

    function suadl() {
        if(isset($_POST['btnLuu'])) {
            $machitiettrochoi = $_POST['txtmachitiettrochoi'];
            $ngaymua = $_POST['txtngaymua'];
            $giamuavao = $_POST['txtgiamuavao'];
            $ngaybaotri = $_POST['txtngaybaotri'];
            $congtybaotri = $_POST['txtcongtybaotri'];
            $nguoibaotri = $_POST['txtnguoibaotri'];
            
            $kq = $this->themcttc_m->chitiettrochoi_upd($machitiettrochoi, $ngaymua, $giamuavao, $ngaybaotri, $congtybaotri, $nguoibaotri);
            if($kq) {
                echo '<script>alert("Sửa thành công!")</script>';    
            } else {
                echo '<script>alert("Sửa thất bại!")</script>';    
            }
            
            $this->view('Masterlayout', [
                'page' => 'dscttc_v',
                'dulieu' => $this->themcttc_m->chitiettrochoi_find('')
            ]);
        }
    }
}
?>