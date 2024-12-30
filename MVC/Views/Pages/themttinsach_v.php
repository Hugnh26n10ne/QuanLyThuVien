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
    <form method="post" action="http://localhost/quanlythuvien/themttinsach_c/Themmoi">
    <h2 style="margin-bottom: 24px;text-align: center;font-weight: 500;">Thêm Thông Tin Sách</h2>
        <div class="form-group">
            <label for="myms">Mã Sách</label>
            <input type="text" class="form-control dd2" placeholder="Mã sách" name="txtmasach" value="<?php if(isset($data['ms'])) echo $data['ms'] ?>">
            <label for="myts">Tên Sách</label>
            <input type="text" id="myts" class="form-control" placeholder="Tên sách" name="txttensach" value="<?php if(isset($data['ts'])) echo $data['ts'] ?>">
            <label for="mytg">Tác Giả</label>
            <input type="text" id="mytg" class="form-control" placeholder="Tác Giả" name="txttacgia" value="<?php if(isset($data['tg'])) echo $data['tg'] ?>">
            <label for="mynxb">Năm Xuất Bản</label>
            <input type="text" class="form-control dd2" placeholder="Năm XB" name="txtnamxuatban" value="<?php if(isset($data['nxb'])) echo $data['nxb'] ?>">
            <label for="mytl">Thể Loại</label>
            <input type="text" id="mytl" class="form-control" placeholder="Thể Loại" name="txttheloai" value="<?php if(isset($data['tl'])) echo $data['tl'] ?>">
            <label for="mynn">Ngày Nhập</label>
            <input type="date" id="mynn" class="form-control" placeholder="Ngày Nhập" name="txtngaynhap" value="<?php if(isset($data['nn'])) echo $data['nn'] ?>">
            <label for="mytt">Tình Trạng</label>
            <input type="text" id="mytt" class="form-control" placeholder="Tình Trạng" name="txttinhtrang" value="<?php if(isset($data['tt'])) echo $data['tt'] ?>">
            
            <button style="margin-top: 20px;" type="submit" class="btn btn-primary" name="btnLuu">Lưu</button>
        </div>
    </form>
</body>
</html>