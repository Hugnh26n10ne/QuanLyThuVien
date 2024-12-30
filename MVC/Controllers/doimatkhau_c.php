<?php
class doimatkhau_c extends controller{
    private $dmk;
    
    function __construct(){
        $this->dmk = $this->model('doimatkhau_m');
    }

    function Get_data() {
        $this->view('Masterlayout', [
            'page' => 'doimatkhau_v',
        ]);
    }

    function doimatkhau() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $newPassword = $_POST["new_password"];
    
            $result = $this->dmk->updmatkhau($username, $password, $newPassword); 
    
            if ($result) {
                echo '<script>alert("Đổi pass thành công!")</script>';    
            } else {
                echo '<script>alert("Tên đăng nhập hoặc mật khẩu không đúng!")</script>';
            }
        } 
        // Gọi lại giao diện
        $this->view('Masterlayout', [
            'page' => 'doimatkhau_v',
        ]);
    }
}
?>