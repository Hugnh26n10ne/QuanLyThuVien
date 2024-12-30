<?php
session_start();
session_destroy();
header("Location: http://localhost/quanlythuvien/Lord.php"); // Đảm bảo đường dẫn đến trang đăng nhập là chính xác
exit();
?>
