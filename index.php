<?php 
    session_start();

    // Kiểm tra xem người dùng đã đăng nhập hay chưa
    if(!isset($_SESSION['user'])){
        // Chuyển hướng người dùng đến trang đăng nhập nếu chưa đăng nhập
        header('Location: http://localhost/quanlythuvien/login.php');
        exit();
    }

    // Tiếp tục xử lý và hiển thị nội dung trang chủ
    include_once './MVC/bridge.php';
    $myapp = new app();
?>