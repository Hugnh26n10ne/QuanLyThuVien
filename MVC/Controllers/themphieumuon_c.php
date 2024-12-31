<?php 
class themphieumuon_c extends controller {
    private $phieumuon_m;
    private $ttinsach_m;

    function __construct() {
        $this->phieumuon_m = $this->model('phieumuon_m'); // Khởi tạo đối tượng model phieumuon_m
        $this->ttinsach_m = $this->model('ttinsach_m');   // Khởi tạo đối tượng model ttinsach_m
    }

    function Get_data() {
        $this->view('Masterlayout', [
            'page' => 'themphieumuon_v'
        ]);
    }

    function themmoi() {
        if (isset($_POST['btnLuu'])) {
            $mamuontra = $_POST['txtmamuontra'];
            $masach = $_POST['txtmasach'];
            $mauser = $_POST['txtmauser'];
            $ngaymuon = $_POST['txtngaymuon'];
            $ngayphaitra = $_POST['txtngayphaitra'];

            // Kiểm tra trùng mã mượn trả
            $kq1 = $this->phieumuon_m->checktrungmamuontra($mamuontra);
            if ($kq1) {
                echo '<script>alert("Trùng mã mượn trả!")</script>';    
            } else {
                // Gọi hàm chèn dữ liệu phieumuon_ins trong phieumuon của model
                $kq = $this->phieumuon_m->phieumuon_ins($mamuontra, $masach, $mauser, $ngaymuon, $ngayphaitra);
                if ($kq) {
                    // Cập nhật tình trạng sách trong ttinsach
                    $this->phieumuon_m->updateTinhTrangSach($masach, 0);
                    echo '<script>alert("Thêm mới thành công!")</script>';    
                } else {
                    echo '<script>alert("Thêm mới thất bại!")</script>';    
                }
            }

            // Gọi lại giao diện
            $this->view('Masterlayout', [
                'page' => 'themphieumuon_v',
                'mamuontra' => $mamuontra,
                'masach' => $masach,
                'mauser' => $mauser,
                'ngaymuon' => $ngaymuon,
                'ngayphaitra' => $ngayphaitra,
            ]);
        }
    }

    function checkSach() {
        if (isset($_POST['masach'])) {
            $masach = $_POST['masach'];
            $result = $this->phieumuon_m->checkTinhTrangSach($masach);
            echo json_encode(['tinhtrang' => $result ? 0 : 1]);
        }
    }
}
?>
