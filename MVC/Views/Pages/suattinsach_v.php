<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* .dd2{width: 780px;} */
    </style>
</head>
<body>
    <form method="post" action="http://localhost/quanlythuvien/danhsachttinsach_c/suadl">
        <h2 style="margin-bottom: 24px;text-align: center;font-weight: 500;">Sửa Thông Tin Sách</h2>
        <div class="form-group">
            <?php 
            if(isset($data['dulieu'])&&mysqli_num_rows($data['dulieu'])>0){
                while($row=mysqli_fetch_array($data['dulieu'])){
            ?>       
      
            <label for="myms">Mã Sách</label>
            <input type="text" class="form-control dd2" placeholder="Mã sách" name="txtmasach" value="<?php echo $row['masach'] ?>" readonly>
            <label for="myts">Tên Sách</label>
            <input type="text" id="mytlv" class="form-control" placeholder="Tên sách" name="txttensach" value="<?php echo $row['tensach'] ?>">
            <label for="mytg">Tác giả</label>
            <input type="text" id="mygv" class="form-control" placeholder="Tác giả" name="txttacgia" value="<?php echo $row['tacgia']?>">
            <label for="mynxb">Năm xuất bản</label>
            <input type="text" class="form-control dd2" placeholder="Năm Xuất bản" name="txtnamxuatban" value="<?php echo $row['namxb'] ?>">
            <label for="mytl">Thể loại</label>
            <input type="text" id="mytlv" class="form-control" placeholder="Thể Loại" name="txttheloai" value="<?php echo $row['theloai'] ?>">
            <label for="mynn">Ngày Nhập</label>
            <input type="date" id="mygv" class="form-control" placeholder="Ngày Nhập" name="txtngaynhap" value="<?php echo $row['ngaynhap']?>">
            <label for="mytt">Tình Trạng</label>
            <input type="text" id="mygv" class="form-control" placeholder="Tình Trạng" name="txttinhtrang" value="<?php echo $row['tinhtrang']?>">
            
            <?php        
            }
        }
            ?>            
            <button style="margin-top: 20px;" type="submit" class="btn btn-primary" name="btnLuu">Lưu</button>

        </div>
    </form>
</body>
</html>