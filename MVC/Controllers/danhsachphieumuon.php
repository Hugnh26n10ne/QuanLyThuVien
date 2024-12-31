<?php 
require './Public/Classes/PHPExcel.php';

class danhsachphieumuon extends controller{
    private $dspm;
    function __construct()
    {
        $this->dspm = $this->model('phieumuon_m');
    }
    function Get_data(){
        $this->view('Masterlayout', [
            'page' => 'danhsachphieumuon_v',
            'dulieu' => $this->dspm->phieumuon_find('', '')
        ]);
    }
    function timkiem(){
        if(isset($_POST['btnTimkiem'])){
            $mamuontra = $_POST['txtmamuontra'];
            $masach = $_POST['txtmasach'];
            $dl = $this->dspm->phieumuon_find($mamuontra, $masach);
            // Gọi lại giao diện và truyền $dl ra
            $this->view('Masterlayout', [
                'page' => 'danhsachphieumuon_v',
                'dulieu' => $dl,
                'mamuontra' => $mamuontra,
                'masach' => $masach
            ]);
        }
    }
    function XuatExcel()
    {
        if (isset($_POST['btnxuatExcel'])) {

            // Code xuất excel

            $objExcel = new PHPExcel();
            $objExcel->setActiveSheetIndex(0);
            $sheet = $objExcel->getActiveSheet()->setTitle('DSPM');
            $rowCount = 1;
            // Tạo tiêu đề cho cột trong excel
            $sheet->setCellValue('A' . $rowCount, 'STT');
            $sheet->setCellValue('B' . $rowCount, 'Mã Mượn Trả');
            $sheet->setCellValue('C' . $rowCount, 'Mã Sách');
            $sheet->setCellValue('D' . $rowCount, 'Mã User');
            $sheet->setCellValue('E' . $rowCount, 'Ngày Mượn');
            $sheet->setCellValue('F' . $rowCount, 'Ngày Phải Trả');
            $sheet->setCellValue('G' . $rowCount, 'Ngày Trả');
            
            // Định dạng cột tiêu đề
            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('C')->setAutoSize(true);
            $sheet->getColumnDimension('D')->setAutoSize(true);
            $sheet->getColumnDimension('E')->setAutoSize(true);
            $sheet->getColumnDimension('F')->setAutoSize(true);
            $sheet->getColumnDimension('G')->setAutoSize(true);
            
            // Gán màu nền
            $sheet->getStyle('A1:G1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');
            // Căn giữa
            $sheet->getStyle('A1:G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // Điền dữ liệu vào các dòng. Dữ liệu lấy từ DB
            $mamuontra = $_POST['txtmamuontra'];
            $masach = $_POST['txtmasach'];
            $data = $this->dspm->phieumuon_find($mamuontra, $masach);
            
            $stt = 1; // Số thứ tự
            foreach ($data as $key => $row) {
                $rowCount++;
                $sheet->setCellValue('A' . $rowCount, $stt++);
                $sheet->setCellValue('B' . $rowCount, isset($row['mamuontra']) ? $row['mamuontra'] : '');
                $sheet->setCellValue('C' . $rowCount, isset($row['masach']) ? $row['masach'] : '');
                $sheet->setCellValue('D' . $rowCount, isset($row['mauser']) ? $row['mauser'] : '');
                $sheet->setCellValue('E' . $rowCount, isset($row['ngaymuon']) ? $row['ngaymuon'] : '');
                $sheet->setCellValue('F' . $rowCount, isset($row['ngayphaitra']) ? $row['ngayphaitra'] : '');
                $sheet->setCellValue('G' . $rowCount, isset($row['ngaytra']) ? $row['ngaytra'] : '');
            }

            // Kẻ bảng 
            $styleAray = array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );
            $sheet->getStyle('A1:' . 'G' . ($rowCount))->applyFromArray($styleAray);
            $objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
            ob_end_clean();
            $fileName = 'ExportExcel.xlsx';
            $objWriter->save($fileName);
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            header('Content-Type: application/vnd.openxlmformatsofficedocument.speadsheetml.sheet');
            header('Content-Length: ' . filesize($fileName));
            header('Content-Transfer-Encoding: binary');
            header('Cache-Control: must-revalidate');
            header('Pragma: no-cache');
            readfile($fileName);
        }
    }

    function xoa($mamuontra){
        $kq = $this->dspm->phieumuon_del($mamuontra);
        if($kq){
            echo '<script>alert("Xóa thành công!")</script>';   
        } else {
            echo '<script>alert("Xóa thất bại!")</script>';   
        }
        // Gọi lại giao diện và truyền $dl ra
        $dl = $this->dspm->phieumuon_find('', '');
        $this->view('Masterlayout', [
            'page' => 'danhsachphieumuon_v',
            'dulieu' => $dl
        ]);
    }
    function sua($mamuontra){
        $this->view('Masterlayout', [
            'page' => 'phieumuon_sua_v',
            'dulieu' => $this->dspm->phieumuon_findupd($mamuontra)
        ]);
    }
    function suadl(){
        if(isset($_POST['btnLuu'])){
            $mamuontra = $_POST['txtmamuontra'];
            $masach = $_POST['txtmasach'];
            $mauser = $_POST['txtmauser'];
            $ngaymuon = $_POST['txtngaymuon'];
            $ngayphaitra = $_POST['txtngayphaitra'];
            $ngaytra = $_POST['txtngaytra'];
    
            if (empty($mamuontra) || empty($masach) || empty($mauser) || empty($ngaymuon) || empty($ngayphaitra)){
                echo '<script>alert("Không được để trống dữ liệu !")</script>';
                $this->view('Masterlayout', [
                    'page' => 'phieumuon_sua_v',
                    'dulieu' => $this->dspm->phieumuon_findupd($mamuontra)
                ]);
                return;
            }
    
            $kq = $this->dspm->phieumuon_upd($mamuontra, $masach, $mauser, $ngaymuon, $ngayphaitra, $ngaytra);
            if($kq){
                echo '<script>alert("Sửa thành công!")</script>';    
            } else {
                echo '<script>alert("Sửa thất bại!")</script>';    
            }
    
            // Gọi lại giao diện
            $this->view('Masterlayout', [
                'page' => 'danhsachphieumuon_v',
                'dulieu' => $this->dspm->phieumuon_find('', '')
            ]);
        } 
    }
}    
?>
