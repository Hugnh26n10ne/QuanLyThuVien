<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST['role'];

    if ($role == 'student') {
        header("Location: http://localhost/quanlythuvien/MVC_SV/index.php");
        exit();
    } elseif ($role == 'admin') {
        header("Location: http://localhost/quanlythuvien/login.php");
        exit();
    } else {
        echo "Vui lòng chọn vai trò hợp lệ.";
    }
} else {
    echo "Phương thức yêu cầu không hợp lệ.";
}
?>
