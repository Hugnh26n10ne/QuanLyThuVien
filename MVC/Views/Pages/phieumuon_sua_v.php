<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Phiếu Mượn</title>
    <style>
        /* .dd2{width: 780px;} */
    </style>
</head>
<body>
    <form method="post" action="http://localhost/quanlythuvien/danhsachphieumuon/suadl">
        <h2 style="margin-bottom: 24px;text-align: center;font-weight: 500;">Sửa Thông Tin Phiếu Mượn</h2>
        <div class="form-group">
            <?php 
            if(isset($data['dulieu'])&&mysqli_num_rows($data['dulieu'])>0){
                while($row=mysqli_fetch_array($data['dulieu'])){
            ?>       
      
            <label for="mymamuontra">Mã Mượn Trả</label>
            <input type="text" class="form-control dd2" placeholder="Mã mượn trả" name="txtmamuontra" value="<?php echo $row['mamuontra'] ?>" readonly>
            <label for="mymasach">Mã Sách</label>
            <input type="text" id="mymasach" class="form-control" placeholder="Mã sách" name="txtmasach" value="<?php echo $row['masach'] ?>">
            <label for="mymauser">Mã User</label>
            <input type="text" id="mymauser" class="form-control" placeholder="Mã user" name="txtmauser" value="<?php echo $row['mauser'] ?>">
            <label for="myngaymuon">Ngày Mượn</label>
            <input type="text" id="myngaymuon" class="form-control" placeholder="Ngày mượn" name="txtngaymuon" value="<?php echo $row['ngaymuon'] ?>">
            <label for="myngayphaitra">Ngày Phải Trả</label>
            <input type="text" id="myngayphaitra" class="form-control" placeholder="Ngày phải trả" name="txtngayphaitra" value="<?php echo $row['ngayphaitra'] ?>">
            <label for="myngaytra">Ngày Trả</label>
            <input type="text" id="myngaytra" class="form-control" placeholder="Ngày trả" name="txtngaytra" value="<?php echo $row['ngaytra'] ?>">
            
            <?php        
            }
        }
            ?>            
            <button style="margin-top: 20px;" type="submit" class="btn btn-primary" name="btnLuu">Lưu</button>

        </div>
    </form>
</body>
</html>
