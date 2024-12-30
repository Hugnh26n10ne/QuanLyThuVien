<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Phiếu Mượn</title>
</head>
<body>
    <form method="post" action="http://localhost/quanlythuvien/danhsachphieumuon/timkiem">
        <div class="form-inline">
            <label style="width:100px;">Mã mượn trả</label>
            <input style="width:400px;" type="text" class="form-control" name="txtmamuontra" 
            value="<?php if(isset($data['mamuontra'])) echo $data['mamuontra'] ?>">
            <label style="width:100px;">Mã sách</label>
            <input style="width:400px;" type="text" class="form-control" name="txtmasach" 
            value="<?php if(isset($data['masach'])) echo $data['masach'] ?>">
            <button type="submit" class="btn btn-success" name="btnTimkiem">Tìm kiếm</button>
        </div>
        <br>
        <table class="table table-striped">
            <thead>
                <tr style="background:#efeded">
                    <th>STT</th>
                    <th>Mã Mượn Trả</th>
                    <th>Mã Sách</th>
                    <th>Mã User</th>
                    <th>Ngày Mượn</th>
                    <th>Ngày Phải Trả</th>
                    <th>Ngày Trả</th>
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
                        <td ><?php echo $row['mamuontra'] ?></td>
                        <td ><?php echo $row['masach'] ?></td>
                        <td ><?php echo $row['mauser'] ?></td>
                        <td ><?php echo $row['ngaymuon'] ?></td>
                        <td ><?php echo $row['ngayphaitra'] ?></td>
                        <td ><?php echo $row['ngaytra'] ?></td>
                        
                        <td>
                            <a href="http://localhost/quanlythuvien/danhsachphieumuon/sua/<?php echo $row['mamuontra'] ?>">
                                <img src="http://localhost/quanlythuvien/Public/Pictures/edit.gif" alt="">
                            </a>
                            <a href="http://localhost/quanlythuvien/danhsachphieumuon/xoa/<?php echo $row['mamuontra'] ?>" 
                            onclick="return confirmDelete();">
                                <img src="http://localhost/quanlythuvien/Public/Pictures/13.png" alt="">
                            </a>

                            <script>
                                // Hàm xác nhận xóa
                                function confirmDelete() {
                                    return confirm("Bạn có chắc chắn muốn xóa phiếu mượn này không?");
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
<form method="post" action="http://localhost/quanlythuvien/danhsachphieumuon/XuatExcel">
    <button class="btn btn-success " name="btnxuatExcel">Xuất Excel</button>
</form>
</body>
</html>
