<?php
    session_start();
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    // So sánh thông tin đăng nhập với cơ sở dữ liệu
    $svname = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'quanlythuvien';
    $conn = mysqli_connect($svname, $user, $pass, $db);

    $sql = "SELECT * FROM admins WHERE username = '$username'";
    $result = $conn->query($sql)->fetch_assoc();

    if ($result && $result['password'] == $password) {
        // Đăng nhập thành công, lưu thông tin người dùng vào phiên (session)
        $_SESSION['user'] = $username;

        header('Location: http://localhost/quanlythuvien/index.php');
        exit();
    } else {
        echo '<script>alert("Đăng nhập thất bại!"); window.location.href = "http://localhost/quanlythuvien/login.php";</script>';
    }

    $conn->close();
?>