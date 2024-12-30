<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="http://localhost/quanlythuvien/danhsachttinsach_c/timkiem">
    <h2 style="margin-bottom: 24px;text-align: center;font-weight: 500;">Danh sách Thông Tin Sách</h2>
        <div class="form-inline">
            <label style="width:110px;">Mã Sách</label>
            <input style="width:400px;" type="text" class="form-control" name="txtmasach" 
            value="<?php if(isset($data['ms'])) echo $data['ms'] ?>">
            <label style="width:110px;">Tên Sách</label>
            <input style="width:400px;" type="text" class="form-control" name="txttensach" 
            value="<?php if(isset($data['ts'])) echo $data['ts'] ?>">

            <button style="margin-left: 12px" type="submit" class="btn btn-success" name="btnTimkiem">Tìm kiếm</button>
        </div>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="color:white;background-color: #343a40;">STT</th>

                    <th style="color:white;background-color: #343a40;">Mã sách</th>
                    <th style="color:white;background-color: #343a40;">Tên sách</th>
                    <th style="color:white;background-color: #343a40;">Tác giả</th>
                    <th style="color:white;background-color: #343a40;">Năm xuất bản</th>
                    <th style="color:white;background-color: #343a40;">Thể loại</th>
                    <th style="color:white;background-color: #343a40;">Ngày Nhập</th>
                    <th style="color:white;background-color: #343a40;">Tình Trạng</th>

                    <th style="color:white;background-color: #343a40;">Thao tác</th>
                    <!-- <th style="color:white;background-color: #343a40;">Tiền cọc</th> -->
                </tr>
            </thead>
            <tbody>
               <?php    
                if(isset($data['dulieu'])&&mysqli_num_rows($data['dulieu'])>0){
                    $i=0;
                    while($row=mysqli_fetch_assoc($data['dulieu'])){
               ?>
                    <tr >
                        <td style="background:#ffffff"><?php echo (++$i) ?></td>
                        <td style="background:#ffffff"><?php echo $row['masach'] ?></td>
                        <td style="background:#ffffff"><?php echo $row['tensach'] ?></td>
                        <td style="background:#ffffff"><?php echo $row['tacgia'] ?></td>
                        <td style="background:#ffffff"><?php echo $row['namxb'] ?></td>
                        <td style="background:#ffffff"><?php echo $row['theloai'] ?></td>
                        <td style="background:#ffffff"><?php echo $row['ngaynhap'] ?></td>
                        <td style="background:#ffffff"><?php echo $row['tinhtrang'] ?></td>

                        <td style="background:#ffffff">
                            <a href="http://localhost/quanlythuvien/danhsachttinsach_c/sua/<?php echo $row['masach'] ?>">
                                <img src="http://localhost/quanlythuvien/Public/Pictures/edit.gif" alt="">
                            </a>
                            <a href="http://localhost/quanlythuvien/danhsachttinsach_c/xoa/<?php echo $row['masach'] ?>">
                                <img src="http://localhost/quanlythuvien/Public/Pictures/13.png" alt="">
                            </a>
                        </td>
 
                    </tr>
               <?php
                    }
                }
               ?>
            </tbody>
        </table>
    </form>
</body>
</html>