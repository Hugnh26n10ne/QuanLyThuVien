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
    <form method="post" action="http://localhost/quanlythuvien/danhsachsinhvien/suadl">
        <h2 style="margin-bottom: 24px;text-align: center;font-weight: 500;">Sửa Thông Tin Bạn Đọc</h2>
        <div class="form-group">
            <?php 
            if(isset($data['dulieu'])&&mysqli_num_rows($data['dulieu'])>0){
                while($row=mysqli_fetch_array($data['dulieu'])){
            ?>       
      
            <label for="mymauser">Mã User</label>
            <input type="text" class="form-control dd2" placeholder="Mã user" name="txtmauser" value="<?php echo $row['mauser'] ?>" readonly>
            <label for="mymasinhvien">Mã sinh viên</label>
            <input type="text" id="mymasinhvien" class="form-control" placeholder="Mã sinh viên" name="txtmasinhvien" value="<?php echo $row['masinhvien'] ?>">
            <label for="mymatkhau">Mật khẩu</label>
            <input type="text" id="mymatkhau" class="form-control" placeholder="Mật khẩu" name="txtmatkhau" value="<?php echo $row['matkhau']?>">
            <label for="mytensinhvien">Tên sinh viên</label>
            <input type="text" class="form-control dd2" placeholder="Tên sinh viên" name="txttensinhvien" value="<?php echo $row['tensinhvien'] ?>">
            <label for="mynamsinh">Năm sinh</label>
            <input type="text" id="mynamsinh" class="form-control" placeholder="Năm sinh" name="txtnamsinh" value="<?php echo $row['namsinh'] ?>">
            <label for="mygioitinh">Giới tính</label>
            <select name="ddlgioitinh" id="mygt" class="form-control">
                <option value="">---Chọn giới tính ---</option>
                <option value="Nam" <?php if(isset($data['gioitinh']) && $data['gioitinh']=='Nam') echo 'selected' ?> >Nam</option>
                <option value="Nữ" <?php if(isset($data['gioitinh']) && $data['gioitinh']=='Nữ') echo 'selected' ?>>Nữ</option>
                <option value="Khác" <?php if(isset($data['gioitinh']) && $data['gioitinh']=='Khác') echo 'selected' ?>>Khác</option>
            </select>
            <label for="mysodienthoai">Số điện thoại</label>
            <input type="text" id="mysodienthoai" class="form-control" placeholder="Số điện thoại" name="txtsodienthoai" value="<?php echo $row['sodienthoai']?>">
            
            <?php        
            }
        }
            ?>            
            <button style="margin-top: 20px;" type="submit" class="btn btn-primary" name="btnLuu">Lưu</button>

        </div>
    </form>
</body>
</html>