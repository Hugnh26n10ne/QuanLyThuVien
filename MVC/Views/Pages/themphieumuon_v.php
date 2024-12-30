<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Phiếu Mượn</title>
    <style>
        .dd2 { width: 720px; }
    </style>
</head>
<body>
    <form method="post" action="http://localhost/quanlythuvien/themphieumuon_c/Themmoi">
        <div class="form-group">
            <label for="mymamuontra">Mã Mượn Trả</label>
            <input type="text" class="form-control dd2" placeholder="Mã mượn trả" name="txtmamuontra" value="<?php if(isset($data['mamuontra'])) echo $data['mamuontra'] ?>">
            
            <label for="mymasach">Mã Sách</label>
            <input type="text" id="mymasach" class="form-control" placeholder="Mã sách" name="txtmasach" value="<?php if(isset($data['masach'])) echo $data['masach'] ?>">
            
            <label for="mymauser">Mã User</label>
            <input type="text" id="mymauser" class="form-control" placeholder="Mã user" name="txtmauser" value="<?php if(isset($data['mauser'])) echo $data['mauser'] ?>">
            
            <label for="myngaymuon">Ngày Mượn</label>
            <input type="text" id="myngaymuon" class="form-control" placeholder="Ngày mượn" name="txtngaymuon" value="<?php if(isset($data['ngaymuon'])) echo $data['ngaymuon'] ?>">
            
            <label for="myngayphaitra">Ngày Phải Trả</label>
            <input type="text" id="myngayphaitra" class="form-control" placeholder="Ngày phải trả" name="txtngayphaitra" value="<?php if(isset($data['ngayphaitra'])) echo $data['ngayphaitra'] ?>">
            
            <label for="myngaytra">Ngày Trả</label>
            <input type="text" id="myngaytra" class="form-control" placeholder="Ngày trả" name="txtngaytra" value="<?php if(isset($data['ngaytra'])) echo $data['ngaytra'] ?>">
            
            <button type="submit" class="btn btn-primary" name="btnLuu">Lưu</button>
        </div>
    </form>
</body>
</html>
