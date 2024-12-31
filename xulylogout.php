<?php
    session_start();

    $_SESSION = array(); // Xóa tất cả các biến phiên

    if (session_destroy()) {
        // Đặt lại phiên trước khi xóa nó
        session_start();
        session_regenerate_id(true);

        $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : 'http://localhost/quanlythuvien/Lord.php';
        header('Location: ' . $redirect);
    } else {
        echo 'Đã xảy ra lỗi khi xóa phiên';
    }
?>