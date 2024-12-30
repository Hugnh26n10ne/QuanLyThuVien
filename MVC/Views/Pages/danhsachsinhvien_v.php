<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="http://localhost/quanlythuvien/danhsachsinhvien/timkiem">
        <div class="form-inline">
            <label style="width:100px;">Mã sinh viên</label>
            <input style="width:400x;" type="text" class="form-control" name="txtmasinhvien" 
            value="<?php if(isset($data['masinhvien'])) echo $data['masinhvien'] ?>">
            <label style="width:100px;">Tên sinh viên</label>
            <input style="width:400px;" type="text" class="form-control" name="txttensinhvien" 
            value="<?php if(isset($data['tensinhvien'])) echo $data['tensinhvien'] ?>">
            <button type="submit" class="btn btn-success" name="btnTimkiem">Tìm kiếm</button>
        </div>
        <br>
        <table class="table table-striped">
            <thead>
                <tr style="background:#efeded">
                    <th>STT</th>
                    <th>Mã User</th>
                    <th>Mã sinh viên</th>
                    <th>Mật khẩu</th>
                    <th>Tên nhân viên</th>
                    <th>Năm sinh</th>
                    <th>Giới tính</th>
                    <th>Số điện thoại</th>
                </tr>
            </thead>
            <tbody>
               <?php    
                if(isset($data['dulieu'])&&mysqli_num_rows($data['dulieu'])>0){
                    $i=0;
                    while($row=mysqli_fetch_assoc($data['dulieu'])){
               ?>
                    <tr >
                        <td ><?php echo (++$i) ?></td>
                        <td ><?php echo $row['mauser'] ?></td>
                        <td ><?php echo $row['masinhvien'] ?></td>
                        <td ><?php echo $row['matkhau'] ?></td>
                        <td ><?php echo $row['tensinhvien'] ?></td>
                        <td ><?php echo $row['namsinh'] ?></td>
                        <td ><?php echo $row['gioitinh'] ?></td>
                        <td ><?php echo $row['sodienthoai'] ?></td>
                        
                        <td>
                            <a href="http://localhost/quanlythuvien/danhsachsinhvien/sua/<?php echo $row['mauser'] ?>">
                                <img src="http://localhost/quanlythuvien/Public/Pictures/edit.gif" alt="">
                            </a>
                            <a href="http://localhost/quanlythuvien/danhsachsinhvien/xoa/<?php echo $row['mauser'] ?>" 
                            onclick="return confirmDelete();">
                                <img src="http://localhost/quanlythuvien/Public/Pictures/13.png" alt="">
                            </a>

                            <script>
                                // Hàm xác nhận xóa
                                function confirmDelete() {
                                    return confirm("Bạn có chắc chắn muốn xóa bạn đọc này không?");
                                }
                            </script>
                        </td>
                    </tr>
               <?php
               }
            } 
           ?>
        </tbody>
    </table>
</form>
<form method="post" action="http://localhost/quanlythuvien/danhsachsinhvien/XuatExcel">
            <button class="btn btn-success " name="btnxuatExcel">Xuất Excel</button>
        </form>
</body>
</html>