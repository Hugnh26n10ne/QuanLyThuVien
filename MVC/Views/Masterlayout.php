<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/quanlythuvien/Public/Css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/quanlythuvien/Public/Css./csstrangchu.css">
    <link rel="stylesheet" href="http://localhost/quanlythuvien/Public/Pictures/logoqlkvc.png">
    <script src="http://localhost/quanlythuvien/Public/Js/jquery-3.3.1.slim.min.js"></script>
    <script src="http://localhost/quanlythuvien/Public/Js/popper.min.js"></script>
    <script src="http://localhost/quanlythuvien/Public/Js/bootstrap.min.js"></script>
    <style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
    .content {
        flex: 1;
    }
    .footer {
        background-color: #f2f2f2;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 150px;
    }

    .footer-left,
    .footer-right {
        flex-basis: 50%;
        text-align: left;
    }

    .footer-left p,
    .footer-right p {
        margin-bottom: 10px;
    }

    .footer a {
        color: #333;
        text-decoration: none;
    }

    .footer a:hover {
        text-decoration: underline;
    }

    .social-icons {
        margin-top: 10px;
        text-align: center;
    }

    .social-icons img{
        display: inline-block;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        text-align: center;
        line-height: 30px;
        margin: 0 5px;
        max-width: 25px;
        max-height: 25px;
        object-fit: cover;
    }
</style>
</head>
<body>
    <div class="logo"></div>
    <div id="header">
        <img src="http://localhost/quanlythuvien/Public/Pictures/logoqlkvc.php" alt="">
        <ul id="theul">
            <li><a href="http://localhost/quanlythuvien/">Trang chủ</a></li>
        </ul>
        <!--  -->
        <div class="logout">
            <a href="#" id="logout-link" class="btn-logout">ĐĂNG XUẤT</a>
        </div>
        <script>
            var logoutLink = document.getElementById("logout-link");
            var currentURL = window.location.href;

            logoutLink.href = "http://localhost/quanlythuvien/xulylogout.php?redirect=" + encodeURIComponent(currentURL);
        </script>
        <!--  -->
    </div>
    <div class="row content">
        <div class="menu_left1" style="width: 250px;">
            <div class="list-group">
                <a style="background: #f8f1f1;font-weight:bold;text-align:left;" href = "#" class = "list-group-item btn btn-link" data-toggle="collapse" data-target="#target1">Quản lý tài khoản</a>
                <div class="collapse" id="target1">
                    <a href = "http://localhost/quanlythuvien/doimatkhau_c" class = "list-group-item">Đổi mật khẩu</a> 
                </div>
                <a style="background: #f8f1f1; font-weight:bold;text-align:left;" href = "#" class = "list-group-item btn btn-link" data-toggle="collapse" data-target="#target2">Quản lý phiếu mượn</a>
                <div class="collapse" id="target2">
                    <a href = "http://localhost/quanlythuvien/themphieumuon_c" class = "list-group-item">Thêm phiếu mượn </a>
                    <a href = "http://localhost/quanlythuvien/danhsachphieumuon" class = "list-group-item">Danh sách phiếu mượn </a>
                </div>
                <a style="background:#f8f1f1;font-weight:bold;text-align:left;" href = "#" class = "list-group-item btn btn-link" data-toggle="collapse" data-target="#target3">Quản lý thông tin sách</a>
                <div class="collapse" id="target3">
                    <a href = "http://localhost/quanlythuvien/themttinsach_c" class = "list-group-item">Thêm sách</a>
                    <a href = "http://localhost/quanlythuvien/danhsachttinsach_c" class = "list-group-item">Danh sách thông tin sách</a>
                </div>
                <a style="background:#f8f1f1;font-weight:bold;text-align:left;" href = "#" class = "list-group-item btn btn-link" data-toggle="collapse" data-target="#target4">Quản lý bạn đọc</a>
                <div class="collapse" id="target4">
                    <a href = "http://localhost/quanlythuvien/themsinhvien_c" class = "list-group-item">Thêm bạn đọc</a>
                    <a href = "http://localhost/quanlythuvien/danhsachsinhvien" class = "list-group-item">Danh sách bạn đọc</a>
                </div>
            </div>
        </div>
        <div class="content1">
            <?php 
                include_once './MVC/Views/Pages/'.$data['page'].'.php';
            ?>
        </div>
    </div>
    <div class='footer'>
        <div class="footer-left">
            <p>Giới thiệu</p>
            <p>Giấy phép xuất bản số 110/GP - BTTTT cấp ngày 24.3.2020 © 2003-2024</p> 
            <!-- <p>Bản quyền thuộc về Báo Thanh Niên. Cấm sao chép dưới mọi hình thức nếu không có sự chấp thuận bằng văn bản.</p> -->
        </div>

        <div class="footer-right">
            <p>Liên hệ</p>
            <p>Địa chỉ: 123 Đường Hoàng Hoa Thám, Thành phố Hà Nội</p>
            <p>Email: example@example.com</p>
            <p>Số điện thoại: 0913537288</p>
        </div>

        <div class="social-icons">
            <img src="https://img.icons8.com/?size=100&id=118468&format=png&color=000000" alt="Facebook Icon">
            <img src="https://img.icons8.com/?size=100&id=32292&format=png&color=000000" alt="Instagram Icon">
            <img src="https://img.icons8.com/?size=100&id=9R1sV3QvY18K&format=png&color=000000" alt="Telegram Icon">
        </div>
    </div>
</body>
</html>
