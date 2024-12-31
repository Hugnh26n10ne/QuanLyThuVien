<?php 
require './Public/Classes/PHPExcel.php';

class danhsachsinhvien extends controller{
    private $dssv;
    function __construct()
    {
        $this->dssv=$this->model('sinhvien_m');
    }
    function Get_data(){
        $this->view('Masterlayout',[
            'page'=>'danhsachsinhvien_v',
            'dulieu'=>$this->dssv->sinhvien_find('','')
        ]);
    }
    function timkiem(){
        if(isset($_POST['btnTimkiem'])){
            $masinhvien=$_POST['txtmasinhvien'];
            $tensinhvien=$_POST['txttensinhvien'];
            $dl=$this->dssv->sinhvien_find($masinhvien,$tensinhvien);
            //Gọi lại giao diện và truyền $dl ra
            $this->view('Masterlayout',[
                'page'=>'danhsachsinhvien_v',
                'dulieu'=>$dl,
                'masinhvien'=>$masinhvien,
                'tensinhvien'=>$tensinhvien
            ]);
        }
    }
    function XuatExcel()
    {
        if (isset($_POST['btnxuatExcel'])) {

            //code xuất excel

            $objExcel = new PHPExcel();
            $objExcel->setActiveSheetIndex(0);
            $sheet = $objExcel->getActiveSheet()->setTitle('DSSV');
            $rowCount = 1;
            //Tạo tiêu đề cho cột trong excel
            $sheet->setCellValue('A' . $rowCount, 'STT');
            $sheet->setCellValue('B' . $rowCount, 'Mã User');
            $sheet->setCellValue('C' . $rowCount, 'Mã sinh viên');
            $sheet->setCellValue('D' . $rowCount, 'Mật khẩu');
            $sheet->setCellValue('E' . $rowCount, 'Tên sinh viên');
            $sheet->setCellValue('F' . $rowCount, 'Năm sinh');
            $sheet->setCellValue('G' . $rowCount, 'Giới tính');
            $sheet->setCellValue('H' . $rowCount, 'Số điện thoại');
            
            

            //định dạng cột tiêu đề
            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('C')->setAutoSize(true);
            $sheet->getColumnDimension('D')->setAutoSize(true);
            $sheet->getColumnDimension('E')->setAutoSize(true);
            $sheet->getColumnDimension('F')->setAutoSize(true);
            $sheet->getColumnDimension('G')->setAutoSize(true);
            $sheet->getColumnDimension('H')->setAutoSize(true);
            
            
            //gán màu nền
            $sheet->getStyle('A1:H1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');
            //căn giữa
            $sheet->getStyle('A1:H1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            //Điền dữ liệu vào các dòng. Dữ liệu lấy từ DB
            $masinhvien=$_POST['txtmasinhvien'];
            $tensinhvien=$_POST['txttensinhvien'];
            $data = $this->dssv->sinhvien_find($masinhvien,$tensinhvien);
            
            $stt = 1; // Số thứ tự
            foreach ($data as $key => $row) {
                $rowCount++;
                $sheet->setCellValue('A' . $rowCount, $stt++);
                $sheet->setCellValue('B' . $rowCount, isset($row['mauser']) ? $row['mauser'] : '');
                $sheet->setCellValue('C' . $rowCount, isset($row['masinhvien']) ? $row['masinhvien'] : '');
                $sheet->setCellValue('D' . $rowCount, isset($row['matkhau']) ? $row['matkhau'] : '');
                $sheet->setCellValue('E' . $rowCount, isset($row['tensinhvien']) ? $row['tensinhvien'] : '');
                $sheet->setCellValue('F' . $rowCount, isset($row['namsinh']) ? $row['namsinh'] : '');
                $sheet->setCellValue('G' . $rowCount, isset($row['gioitinh']) ? $row['gioitinh'] : '');
                $sheet->setCellValue('H' . $rowCount, isset($row['sodienthoai']) ? $row['sodienthoai'] : '');
                
                
            }//Kẻ bảng 
            $styleAray = array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );
            $sheet->getStyle('A1:' . 'I' . ($rowCount))->applyFromArray($styleAray);
            $objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
            ob_end_clean();
            $fileName = 'ExportExcel.xlsx';
            $objWriter->save($fileName);
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            header('Content-Type: application/vnd.openxlmformatsofficedocument.speadsheetml.sheet');
            header('Content-Length: ' . filesize($fileName));
            header('Content-Transfer-Encoding:binary');
            header('Cache-Control: must-revalidate');
            header('Pragma: no-cache');
            readfile($fileName);
        }
    }

    function xoa($mauser){
        $kq=$this->dssv->sinhvien_del($mauser);
        if($kq){
            echo '<script>alert("Xóa thành công!")</script>';   
        }
        else{
            echo '<script>alert("Xóa thất bại!")</script>';   
        }
        //Gọi lại giao diện và truyền $dl ra
        $dl=$this->dssv->sinhvien_find('','');
        $this->view('Masterlayout',[
            'page'=>'danhsachsinhvien_v',
            'dulieu'=>$dl
        ]);
    }
    function sua($mauser){
        $this->view('Masterlayout',[
            'page'=>'sinhvien_sua_v',
            'dulieu'=>$this->dssv->sinhvien_findupd($mauser,'')
        ]);
    }
    function suadl(){
        if(isset($_POST['btnLuu'])){
            $mauser=$_POST['txtmauser'];
            $masinhvien=$_POST['txtmasinhvien'];
            $matkhau=$_POST['txtmatkhau'];
            $tensinhvien=$_POST['txttensinhvien'];
            $namsinh=$_POST['txtnamsinh'];
            $gioitinh=$_POST['ddlgioitinh'];
            $sodienthoai=$_POST['txtsodienthoai'];

            if (empty($mauser) || empty($masinhvien) || empty($matkhau) || empty($tensinhvien) || empty($namsinh) || empty($gioitinh) || empty($sodienthoai)){
                echo '<script>alert("Không được để trống dữ liệu !")</script>';
                $this->view('Masterlayout',[
                    'page' => 'sinhvien_sua_v',
                    'dulieu'=>$this->dssv->sinhvien_findupd($mauser,'')
                ]);
                return;
            }else{

            // if (!$this->dsnv->kiemtramanoilamviec($mnlv)) {
                // echo '<script>alert("Mã nơi làm việc không tồn tại!")</script>';
                // $this->view('Masterlayout', [
                    // 'page' => 'nhanvien_sua_v',
                    // 'dulieu'=>$this->dsnv->nhanvien_find($manhanvien,'')
                // ]);
                // return;
            // }
            //gọi hàm chèn dl tacgia_ins trong tacgia của model
            $kq=$this->dssv->sinhvien_upd($mauser,$masinhvien,$matkhau,$tensinhvien,$namsinh,$gioitinh,$sodienthoai);
            if($kq){
                echo '<script>alert("Sửa thành công!")</script>';    
            }
            else{
                echo '<script>alert("Sửa thất bại!")</script>';    
            }
                }
            
            //Gọi lại giao diện
            $this->view('Masterlayout',[
                'page'=>'danhsachsinhvien_v',
                'dulieu' => $this->dssv->sinhvien_find('','')
            ]);
        } 
    }
}
?>